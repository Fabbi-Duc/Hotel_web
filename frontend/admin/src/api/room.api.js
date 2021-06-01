import request from "@/utils/request";

export const listRooms = params => {
  return request({
    url: "/rooms/list",
    method: "get",
    params
  });
};

export const deleteRoom = params => {
  return request({
    url: "/room/delete",
    method: "delete",
    params
  });
};

export const getRoomType = () => {
  return request({
    url: "/get-roomType",
    method: "get",
  })
}

export const getInfoRoom = id => {
  return request({
    url: "/room/" + id,
    method: "get",
  })
}

export const getRoomFloor = params => {
  return request({
    url: "/rooms",
    method: "get",
    params
  })
}

export const createRoom = params => {
  return request({
    url: "/room/create",
    method: "post",
    params
  })
}

export const getNameRoom = () => {
  return request({
    url: "/room",
    method: "get",
  })
}

export const updateRoom = params => {
  return request({
    url: "/room/update",
    method: "post",
    params
  })
}

export const getInfoRoomCustomer = id => {
  return request({
    url: "/room-customer/" + id,
    method: "get",
  })
}
