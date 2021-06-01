import { getRevenue, getRevenueByMonth } from "@/api/bills.api";

export const actions = {
  getRevenue({ commit }) {
    return new Promise((resolve, reject) => {
      getRevenue()
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  },

  getRevenueByMonth({ commit }, params) {
    return new Promise((resolve, reject) => {
      getRevenueByMonth(params)
        .then(response => {
          resolve(response);
        })
        .catch(error => {
          reject(error);
        });
    });
  }
}
