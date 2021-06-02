
export const state = {
  isLoading: true
};

export const getters = {
  isLoading: state => state.isLoading
};

export const mutations = {
  SET_IS_LOADING(state, payload) {
    state.isLoading = payload;
  }
};

export const actions = {
  setIsLoading({ commit }, status) {
    commit("SET_IS_LOADING", status);
  }
};
