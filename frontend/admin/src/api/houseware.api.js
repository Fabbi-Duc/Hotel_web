import request from "@/utils/request";

export const listHouseware = params => {
  return request({
    url: "/list-houseware",
    method: "get",
    params
  });
};

export const deleteData = id => {
  return request({
    url: "/delete-houseware/" + id,
    method: "delete",
  });
};

export const createHouseware = params => {
  return request({
    url: "/create-houseware",
    method: "post",
		params
  });
};

export const infoHouseware = id => {
  return request({
    url: "/getinfo-houseware/" + id,
    method: "get",
  });
};

export const updateHouseware = params => {
  return request({
    url: "/update-houseware",
    method: "post",
		params
  });
};

export const getAllHouseware = () => {
  return request({
    url: "/all-houseware",
    method: "get"
  });
};

export const createCouponHouseware = params => {
  return request({
    url: "/create-coupon-houseware",
    method: "post",
    params
  });
};

export const listCouponHouseware = params => {
  return request({
    url: "/list-coupon-houseware",
    method: "get",
    params
  });
};

export const deleteCouponHouseware = id => {
  return request({
    url: "/delete-coupon-houseware/" + id,
    method: "delete",
  });
};

export const getInfoCouponHouseware = id => {
  return request({
    url: "/getinfo-coupon-houseware/" + id,
    method: "get",
  });
};

export const updateCouponHouseware = params => {
  return request({
    url: "/update-coupon-houseware",
    method: "post",
    params
  });
};

export const createExportHouseware = params => {
  return request({
    url: "/create-export-houseware",
    method: "post",
    params
  });
};

export const listExportHouseware = params => {
  return request({
    url: "/list-export-houseware",
    method: "get",
    params
  });
};

export const deleteExportHouseware = id => {
  return request({
    url: "/delete-export-houseware/" + id,
    method: "delete",
  });
};

export const updateExportHouseware = params => {
  return request({
    url: "/update-export-houseware",
    method: "post",
    params
  });
};

export const getInfoExportHouseware = id => {
  return request({
    url: "/getinfo-export-houseware/" + id,
    method: "get",
  });
};

export const getListExportHouseware = params => {
  return request({
    url: "/getlist-export-houseware",
    method: "get",
    params
  });
};

export const completeCouponHouseware = params => {
  return request({
    url: "/complete-coupon-houseware",
    method: "post",
    params
  });
};

export const completeExportHouseware = id => {
  return request({
    url: "/complete-export-houseware/" + id,
    method: "get",
  });
};

export const refuseExportHouseware = id => {
  return request({
    url: "/refuse-export-houseware/" + id,
    method: "get",
  });
};
