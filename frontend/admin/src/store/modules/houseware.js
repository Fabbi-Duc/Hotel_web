import {
  listHouseware, deleteData, createHouseware,
  infoHouseware, updateHouseware, getAllHouseware
  , createCouponHouseware, listCouponHouseware, deleteCouponHouseware, getInfoCouponHouseware,
  updateCouponHouseware, createExportHouseware, listExportHouseware, deleteExportHouseware,
  updateExportHouseware, getInfoExportHouseware, getListExportHouseware,completeCouponHouseware,
  completeExportHouseware, refuseExportHouseware
} from "@/api/houseware.api";

export const state = {
};

export const getters = {
};

export const mutations = {
};

export const actions = {
  getListHouseware({ commit }, params) {
    return new Promise((resolve, reject) => {
      listHouseware(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },
  deleteData({ commit }, id) {
    return new Promise((resolve, reject) => {
      deleteData(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  createHouseware({ commit }, params) {
    return new Promise((resolve, reject) => {
      createHouseware(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  infoHouseware({ commit }, id) {
    return new Promise((resolve, reject) => {
      infoHouseware(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  updateHouseware({ commit }, params) {
    return new Promise((resolve, reject) => {
      updateHouseware(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getAllHouseware({ commit }) {
    return new Promise((resolve, reject) => {
      getAllHouseware()
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  createCouponHouseware({ commit }, params) {
    return new Promise((resolve, reject) => {
      createCouponHouseware(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  listCouponHouseware({ commit }, params) {
    return new Promise((resolve, reject) => {
      listCouponHouseware(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  deleteCouponHouseware({ commit }, id) {
    return new Promise((resolve, reject) => {
      deleteCouponHouseware(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getInfoCouponHouseware({ commit }, id) {
    return new Promise((resolve, reject) => {
      getInfoCouponHouseware(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  updateCouponHouseware({ commit }, params) {
    return new Promise((resolve, reject) => {
      updateCouponHouseware(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  createExportHouseware({ commit }, params) {
    return new Promise((resolve, reject) => {
      createExportHouseware(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  listExportHouseware({ commit }, params) {
    return new Promise((resolve, reject) => {
      listExportHouseware(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  deleteExportHouseware({ commit }, id) {
    return new Promise((resolve, reject) => {
      deleteExportHouseware(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  updateExportHouseware({ commit }, params) {
    return new Promise((resolve, reject) => {
      updateExportHouseware(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },
  getInfoExportHouseware({ commit }, id) {
    return new Promise((resolve, reject) => {
      getInfoExportHouseware(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getListExportHouseware({ commit }, params) {
    return new Promise((resolve, reject) => {
      getListExportHouseware(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },
  completeCouponHouseware({ commit }, params) {
    return new Promise((resolve, reject) => {
      completeCouponHouseware(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  completeExportHouseware({ commit }, id) {
    return new Promise((resolve, reject) => {
      completeExportHouseware(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },
  refuseExportHouseware({ commit }, id) {
    return new Promise((resolve, reject) => {
      refuseExportHouseware(id)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },
}