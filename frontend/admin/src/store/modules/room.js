import { listRooms, deleteRoom, getRoomType, getInfoRoom, createRoom, getNameRoom, updateRoom, getRoomFloor, getInfoRoomCustomer, getCountRoom } from "@/api/room.api";

export const state = {
  listRooms: null,
};

export const getters = {
  listRooms: state => state.listRooms,
};

export const mutations = {
  setListRooms(state, listRooms) {
    state.listRooms = listRooms;
  },
};

export const actions = {
  getListRooms({ commit }, payload) {
    return new Promise((resolve, reject) => {
      listRooms(payload)
        .then(response => {
          commit('setListRooms', response.data);
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  deleteRoom({ commit }, payload) {
    return new Promise((resolve, reject) => {
      deleteRoom(payload)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getRoomType({ commit }) {
    return new Promise((resolve, reject) => {
      getRoomType()
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getInfoRoom({ commit }, id) {
    return new Promise((resolve, reject) => {
      getInfoRoom(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getRoomFloor({ commit }, params) {
    return new Promise((resolve, reject) => {
      getRoomFloor(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  createRoom({ commit }, payload) {
    return new Promise((resolve, reject) => {
      createRoom(payload)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getNameRoom({ commit }) {
    return new Promise((resolve, reject) => {
      getNameRoom()
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  updateRoom({ commit }, payload) {
    return new Promise((resolve, reject) => {
      updateRoom(payload)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getInfoRoomCustomer({ commit }, id) {
    return new Promise((resolve, reject) => {
      getInfoRoomCustomer(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getCountRoom({ commit }) {
    return new Promise((resolve, reject) => {
      getCountRoom()
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  }
}
