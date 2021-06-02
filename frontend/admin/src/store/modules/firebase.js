import db from "@/plugins/firebase";

// const db = firebase.db;

export const state = {
  listRoom: [],
  room: {},
  messages: {},
  members: [],
  roomId: null
};

export const getters = {
  listRoom: state => state.listRoom,
  room: state => state.room,
  members: state => state.members,
  messages: state => state.messages,
  roomId: state => state.roomId
};

export const mutations = {
  setListRoom(state, data) {
    state.listRoom = data;
  },
  setRoom(state, room) {
    state.room = room;
  },
  setMembers(state, members) {
    state.members = members;
  },
  setListMessage(state, messages) {
    state.messages = messages;
  },
  setRoomId(state, roomId) {
    state.roomId = roomId;
  }
};

export const actions = {
  // eslint-disable-next-line no-unused-vars
  async createRoom({ commit }, data) {
    let batchUser = db.batch();
    data.users.forEach(async user => {
      batchUser.set(db.collection("users").doc(user.id), user.data);
    });
    await batchUser.commit();
    let rooms = await db
      .collection("rooms")
      .get();
    for (let index = 0; index < rooms.docs.length; index++) {
      let room = rooms.docs[index];
      if (JSON.stringify(room.data().userId) === JSON.stringify(data.userId)) {
        return room.id;
      }
    }
    let room = await db.collection("rooms").add({
      userId: data.userId,
      createdAt: new Date(),
      lastSentDateTime: new Date()
    });

    return room.id;
  },
  // eslint-disable-next-line no-unused-vars
  getListRoom({ commit }, data) {
    let listRoom = [];
    db.collection("rooms")
      .where("type", "in", data.type)
      .onSnapshot(rooms => {
        rooms.forEach(async room => {
          let isUserRoom = false;
          let members = await db
            .collection("rooms")
            .doc(room.id)
            .collection("members")
            .get();
          let users = [];
          members.forEach(member => {
            if (
              member.data().userId.id === data.userId &&
              member.data().isHidden === false
            ) {
              isUserRoom = true;
            }
          });
          if (isUserRoom) {
            let sender = null,
              receiver = [],
              roomName = [];
            members.forEach(member => {
              db.collection("users")
                .doc(member.data().userId.id)
                .get()
                .then(user => {
                  users.push({ ...user.data(), id: parseInt(user.id) });
                  if (room.data().type === 3) {
                    if (user.data().sex === 1) {
                      sender = user.data();
                      roomName.unshift(user.data().nickname);
                    } else {
                      receiver.push(user.data());
                      roomName.push(user.data().nickname);
                    }
                  } else {
                    if (user.id === data.userId) {
                      sender = user.data();
                    } else {
                      receiver.push(user.data());
                    }
                  }
                });
            });
            let notSeenMessage = 0;
            let lastMessage = "";
            db.collection("rooms")
              .doc(room.id)
              .collection("messages")
              .orderBy("createdAt")
              .get()
              .then(async messages => {
                messages.forEach(message => {
                  db.collection("rooms")
                    .doc(room.id)
                    .collection("messages")
                    .doc(message.id)
                    .collection("read_users")
                    .where("userId", "==", parseInt(data.userId))
                    .get()
                    .then(readUsers => {
                      if (readUsers.docs.length === 0) {
                        if (state.roomId != room.id) {
                          notSeenMessage++;
                        }
                      }
                    });
                });
                db.collection("rooms")
                  .doc(room.id)
                  .collection("messages")
                  .orderBy("createdAt", "desc")
                  .limit(1)
                  .get()
                  .then(lastMessages => {
                    lastMessage =
                      lastMessages.docs.length > 0
                        ? lastMessages.docs[0].data()
                        : "";
                    if (messages.docs.length !== 0 || room.data().type !== 2) {
                      const listRoomId = listRoom.map(roomInfo => roomInfo.id);
                      if (!listRoomId.includes(room.id)) {
                        const roomData = {
                          ...room.data(),
                          id: room.id,
                          user: users,
                          message: lastMessage,
                          notify: notSeenMessage,
                          sender: sender,
                          receiver: receiver,
                          roomName: roomName
                        };
                        listRoom.push(roomData);
                      } else {
                        listRoom.forEach(roomInfo => {
                          if (roomInfo.id === room.id) {
                            roomInfo.message = Object.assign(
                              {},
                              roomInfo.message,
                              lastMessage
                            );
                            roomInfo.notify = notSeenMessage;
                          }
                        });
                      }
                    }
                  });
              });
          }
        });
      });
    commit("setListRoom", listRoom);
  },
  async getRoom({ commit }, data) {
    let room = db.collection("rooms").doc(data.roomId);
    room.get().then(room => {
      commit("setRoom", room.data());
    });
    room
      .collection("messages")
      .orderBy("createdAt")
      .onSnapshot(async messages => {
        commit("setListMessage", messages.docs);
      });
  },
  // eslint-disable-next-line no-unused-vars
  async createMessage({ commit }, data) {
    let room = db.collection("rooms")
      .doc(data.roomId);
    room.update({
        lastSentDateTime: new Date()
      });
    room.collection("messages")
      .add(data.message);
  }
};
