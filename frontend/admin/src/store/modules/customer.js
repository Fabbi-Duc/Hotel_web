import { listCustomers, 
          bookRoom, getInfoCustomer, updateBookRoom, 
          registerCustomer, getFood, order, listOrder, 
          listFoodOrder, updateOrder, bookRoomOnline, 
          listClean, updateClean, listPark, updatePark, getCustomerFood, clean, getCountCustomer } from "@/api/customer.api";

export const state = {
  listCustomer: null,
};

export const getters = {
  listCustomer: state => state.listCustomer,
};

export const mutations = {
  setListCustomer(state, listCustomer) {
    state.listCustomer = listCustomer;
  },
};

export const actions = {

  registerCustomer({ commit }, payload) {
    return new Promise((resolve, reject) => {
      registerCustomer(payload)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getListCustomer({ commit }, payload) {
    return new Promise((resolve, reject) => {
      listCustomers(payload)
        .then(response => {
          commit('setListCustomer', response.data);
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
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  bookRoomOnline({ commit }, payload) {
    return new Promise((resolve, reject) => {
      bookRoomOnline(payload)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getInfoCustomer({ commit }, id) {
    return new Promise((resolve, reject) => {
      getInfoCustomer(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  updateBookRoom({ commit }, id) {
    return new Promise((resolve, reject) => {
      updateBookRoom(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getFood({ commit }, params) {
    return new Promise((resolve, reject) => {
      getFood(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  order({ commit }, params) {
    return new Promise((resolve, reject) => {
      order(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  listOrder({ commit }, params) {
    return new Promise((resolve, reject) => {
      listOrder(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  listFoodOrder({ commit }, room_service_food_id) {
    return new Promise((resolve, reject) => {
      listFoodOrder(room_service_food_id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  updateOrder({ commit }, room_service_food_id) {
    return new Promise((resolve, reject) => {
      updateOrder(room_service_food_id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  listClean({ commit }) {
    return new Promise((resolve, reject) => {
      listClean()
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  updateClean({ commit }, room_id) {
    return new Promise((resolve, reject) => {
      updateClean(room_id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  clean({ commit }, room_id) {
    return new Promise((resolve, reject) => {
      clean(room_id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  listPark({ commit }, data) {
    return new Promise((resolve, reject) => {
      listPark(data)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  updatePark({ commit }, data) {
    return new Promise((resolve, reject) => {
      updatePark(data)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getCustomerFood({ commit }, id) {
    return new Promise((resolve, reject) => {
      getCustomerFood(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getCountCustomer({ commit }) {
    return new Promise((resolve, reject) => {
      getCountCustomer()
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  }
}
