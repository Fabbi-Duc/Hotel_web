import request from "@/utils/request";

export const saveToken = data => {
  return request({
    url: "/notifications/save-device-token",
    method: "post",
    data
  });
};

export const sendNotification = data => {
  return request({
    url: "/notifications/send-notification",
    method: "post",
    data
  });
};

export const sendNotificationFirebase = data => {
  return request({
    url: "/notifications/send-notification-firebase",
    method: "post",
    data
  });
};

export const getNotification = id => {
  return request({
    url: "/notifications/" + id,
    method: "get",
  });
};

export const updateNotification = id => {
  return request({
    url: "/update-notifications/" + id,
    method: "get",
  });
};
