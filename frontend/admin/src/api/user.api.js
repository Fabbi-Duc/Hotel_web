import request from "@/utils/request";

export const listUsers = params => {
  return request({
    url: "/users/list",
    method: "get",
    params
  });
};

export const bookRoom = params => {
  return request({
    url: "/qr-code",
    method: "get",
    params
  });
};

export const deleteUser = id => {
  return request({
    url: "/user/" + id,
    method: "delete",
  });
};

export const createUser = params => {
  return request({
    url: "/user/create",
    method: "post",
    params
  });
};

export const updateUser = params => {
  return request({
    url: "/user/update",
    method: "post",
    params
  });
};

export const getInfoUser = id => {
  return request({
    url: "/user/detail/" + id,
    method: "get",
  });
};

export const pay = id => {
  return request({
    url: "/pay/" + id,
    method: "get",
  });
};

export const listFood = params => {
  return request({
    url: "/food-list",
    method: "get",
    params
  });
};

export const getCountUser = params => {
  return request({
    url: "/get-count-user",
    method: "get",
    params
  });
};


export const getInfoFood = id => {
  return request({
    url: "/food/" + id,
    method: "get",
  });
};

export const createFood = params => {
  return request({
    url: "/food/create",
    method: "post",
    params
  });
};

export const updateFood = params => {
  return request({
    url: "/food/update",
    method: "post",
    params
  });
};

export const deleteFood = id => {
  return request({
    url: "/food/delete/" + id,
    method: "delete",
  });
};

export const createPark = params => {
  return request({
    url: "/create-park",
    method: "post",
    params
  });
};

