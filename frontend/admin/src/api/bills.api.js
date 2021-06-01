import request from "@/utils/request";

export const getRevenue = params => {
  return request({
    url: "/revenue",
    method: "get",
    params
  })
}

export const getRevenueByMonth = params => {
  return request({
    url: "/getRevenueByMonth",
    method: "get",
    params
  })
}