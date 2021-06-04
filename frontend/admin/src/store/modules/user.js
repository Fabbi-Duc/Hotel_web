import {
  listUsers, bookRoom, deleteUser,
  createUser, updateUser, getInfoUser,
  pay, createFood, updateFood, listFood, getInfoFood, deleteFood, createPark,
  getCountUser, checkTimeSheet, checkIn, checkOut, getTimeSheet, createUpdateTimeSheet, getInfoListUpdateTimeSheet,
  deleteUpdateTimeSheet, updateUpdateTimeSheet, getListUpdateTimeSheet, successUpdateTimeSheet, refuseUpdateTimeSheet,
  getTimeSheetMounth, getRoom, updateChangeRoom
} from "@/api/user.api";

export const state = {
  listUsers: null,
  bookRoom: null,
};

export const getters = {
  listUsers: state => state.listUsers,
  bookRoom: state => state.bookRoom,
};

export const mutations = {
  setListUsers(state, listUsers) {
    state.listUsers = listUsers;
  },
  setBookRoom(state, bookRoom) {
    state.bookRoom = bookRoom;
  },
};

export const actions = {
  getListUsers({ commit }, payload) {
    return new Promise((resolve, reject) => {
      listUsers(payload)
        .then(response => {
          commit('setListUsers', response.data);
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },
  bookRoom({ commit }, payload) {
    return new Promise((resolve, reject) => {
      bookRoom(payload)
        .then(response => {
          commit('setBookRoom', response.data);
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getInfoUser({ commit }, id) {
    return new Promise((resolve, reject) => {
      getInfoUser(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  deleteUser({ commit }, id) {
    return new Promise((resolve, reject) => {
      deleteUser(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  pay({ commit }, id) {
    return new Promise((resolve, reject) => {
      pay(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  createUser({ commit }, params) {
    return new Promise((resolve, reject) => {
      createUser(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  updateUser({ commit }, params) {
    return new Promise((resolve, reject) => {
      updateUser(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  listFood({ commit }, params) {
    return new Promise((resolve, reject) => {
      listFood(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  updateFood({ commit }, params) {
    return new Promise((resolve, reject) => {
      updateFood(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  createFood({ commit }, params) {
    return new Promise((resolve, reject) => {
      createFood(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getInfoFood({ commit }, id) {
    return new Promise((resolve, reject) => {
      getInfoFood(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  deleteFood({ commit }, id) {
    return new Promise((resolve, reject) => {
      deleteFood(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  createPark({ commit }, params) {
    return new Promise((resolve, reject) => {
      console.log(params);
      createPark(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getCountUser({ commit }) {
    return new Promise((resolve, reject) => {
      getCountUser()
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    })
  },

  checkTimeSheet({ commit }, id) {
    return new Promise((resolve, reject) => {
      checkTimeSheet(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    })
  },

  checkIn({ commit }, data) {
    return new Promise((resolve, reject) => {
      checkIn(data)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    })
  },

  checkOut({ commit }, data) {
    return new Promise((resolve, reject) => {
      checkOut(data)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    })
  },

  getTimeSheet({ commit }, data) {
    return new Promise((resolve, reject) => {
      getTimeSheet(data)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    })
  },

  createUpdateTimeSheet({ commit }, params) {
    return new Promise((resolve, reject) => {
      createUpdateTimeSheet(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    })
  },

  getInfoListUpdateTimeSheet({ commit }, params) {
    return new Promise((resolve, reject) => {
      getInfoListUpdateTimeSheet(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    })
  },

  getListUpdateTimeSheet({ commit }, params) {
    return new Promise((resolve, reject) => {
      getListUpdateTimeSheet(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    })
  },

  deleteUpdateTimeSheet({ commit }, id) {
    return new Promise((resolve, reject) => {
      deleteUpdateTimeSheet(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    })
  },

  updateUpdateTimeSheet({ commit }, params) {
    return new Promise((resolve, reject) => {
      updateUpdateTimeSheet(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    })
  },

  successUpdateTimeSheet({ commit }, params) {
    return new Promise((resolve, reject) => {
      successUpdateTimeSheet(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    })
  },

  refuseUpdateTimeSheet({ commit }, params) {
    return new Promise((resolve, reject) => {
      refuseUpdateTimeSheet(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    })
  },
  getTimeSheetMounth({ commit }, id) {
    return new Promise((resolve, reject) => {
      getTimeSheetMounth(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    })
  },

  getRoom({ commit }, id) {
    return new Promise((resolve, reject) => {
      getRoom(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    })
  },

  updateChangeRoom({ commit }, params) {
    return new Promise((resolve, reject) => {
      updateChangeRoom(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    })
  },

}