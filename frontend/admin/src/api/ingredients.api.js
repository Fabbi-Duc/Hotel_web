import request from "@/utils/request";

export const listHouseware = params => {
  return request({
    url: "/list-ingredients",
    method: "get",
    params
  });
};

export const deleteData = id => {
  return request({
    url: "/delete-ingredients/" + id,
    method: "delete",
  });
};

export const createHouseware = params => {
  return request({
    url: "/create-ingredients",
    method: "post",
		params
  });
};

export const infoHouseware = id => {
  return request({
    url: "/getinfo-ingredients/" + id,
    method: "get",
  });
};

export const updateHouseware = params => {
  return request({
    url: "/update-ingredients",
    method: "post",
		params
  });
};

export const getAllHouseware = () => {
  return request({
    url: "/all-ingredients",
    method: "get"
  });
};

export const createCouponHouseware = params => {
  return request({
    url: "/create-coupon-ingredients",
    method: "post",
    params
  });
};

export const listCouponHouseware = params => {
  return request({
    url: "/list-coupon-ingredients",
    method: "get",
    params
  });
};

export const deleteCouponHouseware = id => {
  return request({
    url: "/delete-coupon-ingredients/" + id,
    method: "delete",
  });
};

export const getInfoCouponHouseware = id => {
  return request({
    url: "/getinfo-coupon-ingredients/" + id,
    method: "get",
  });
};

export const updateCouponHouseware = params => {
  return request({
    url: "/update-coupon-ingredients",
    method: "post",
    params
  });
};

export const completeCouponHouseware = params => {
  return request({
    url: "/complete-coupon-ingredients",
    method: "post",
    params
  });
};

export const createExportHouseware = params => {
  return request({
    url: "/create-export-ingredients",
    method: "post",
    params
  });
};

export const listExportHouseware = params => {
  return request({
    url: "/list-export-ingredients",
    method: "get",
    params
  });
};

export const deleteExportHouseware = id => {
  return request({
    url: "/delete-export-ingredients/" + id,
    method: "delete",
  });
};

export const updateExportHouseware = params => {
  return request({
    url: "/update-export-ingredients",
    method: "post",
    params
  });
};

export const getInfoExportHouseware = id => {
  return request({
    url: "/getinfo-export-ingredients/" + id,
    method: "get",
  });
};

export const getListExportHouseware = params => {
  return request({
    url: "/getlist-export-ingredients",
    method: "get",
    params
  });
};

export const completeExportHouseware = id => {
  return request({
    url: "/complete-export-ingredients/" + id,
    method: "get",
  });
};

export const refuseExportHouseware = id => {
  return request({
    url: "/refuse-export-ingredients/" + id,
    method: "get",
  });
};

