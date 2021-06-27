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

export const checkTimeSheet = id => {
  return request({
    url: "/check-timesheet/" + id,
    method: "get",
  });
};

export const checkIn = params => {
  return request({
    url: "/check-in",
    method: "get",
    params
  });
};

export const checkOut = params => {
  return request({
    url: "/check-out",
    method: "get",
    params
  });
};

export const getTimeSheet = params => {
  return request({
    url: "/get-time-sheet",
    method: "get",
    params
  });
};

export const createUpdateTimeSheet = params => {
  return request({
    url: "/create-update-timesheet",
    method: "post",
    params
  });
};

export const getInfoListUpdateTimeSheet = params => {
  return request({
    url: "/list-info-update-timesheet",
    method: "get",
    params
  });
};

export const getListUpdateTimeSheet = params => {
  return request({
    url: "/list-update-timesheet",
    method: "get",
    params
  });
};

export const deleteUpdateTimeSheet = id => {
  return request({
    url: "/delete-update-timesheet/" + id,
    method: "delete",
  });
};

export const updateUpdateTimeSheet = params => {
  return request({
    url: "/update-update-timesheet",
    method: "post",
    params
  });
};

export const successUpdateTimeSheet = params => {
  return request({
    url: "/success-update-timesheet",
    method: "post",
    params
  });
};

export const refuseUpdateTimeSheet = params => {
  return request({
    url: "/refuse-update-timesheet",
    method: "post",
    params
  });
};

export const getTimeSheetMounth = id => {
  return request({
    url: "/mounth-timesheet/" + id,
    method: "get"
  });
};

export const getRoom = id => {
  return request({
    url: "/get-room/" + id,
    method: "get"
  });
};

export const updateChangeRoom = params => {
  return request({
    url: "/update-change-room",
    method: "get",
    params
  });
};

export const getSendMailTimeSheet = params => {
  return request({
    url: "/get-send-time-sheet",
    method: "get",
    params
  })
}

export const getAllUser = () =>{
  return request({
    url: "/get-all-user",
    method: "get"
  })
}

