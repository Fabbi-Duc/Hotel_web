import request from "@/utils/request";

export const signIn = data => {
  return request({
    url: "/sign-in",
    method: "post",
    data
  });
};

export const account = () => {
  return request({
    url: "/account",
    method: "get"
  });
};

export const accountCustomer = () => {
  return request({
    url: "/customer",
    method: "get"
  });
};

export const loginCustomer = data => {
  return request({
    url: "/login-customer",
    method: "post",
    data
  });
};