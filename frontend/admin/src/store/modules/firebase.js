import firebase from "@/plugins/firebase";

const db = firebase.db;

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
  getListRoom({ commit }, userId) {
    let listRoom = [];
    db.collection("rooms")
      .onSnapshot(rooms => {
        rooms.forEach(async room => {
          if (room.data().userId.includes(userId)) {
            let receiverId = room.data().userId.filter(id => id !== userId);
            console.log(receiverId);
            let receiver = await db.collection("users").doc(receiverId[0]).get();
            receiver = { ...receiver.data(), roomId: room.id }
            const listRoomId = listRoom.map(roomInfo => roomInfo.roomId);
            if (!listRoomId.includes(room.id)) {
              listRoom.push(receiver);
            }
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
