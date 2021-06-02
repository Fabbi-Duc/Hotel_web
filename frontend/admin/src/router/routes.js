function page(path) {
  return () => import(`@/pages/${path}`).then(m => m.default || m);
}

function view(path) {
  return () => import(`@/views/${path}`).then(m => m.default || m);
}

function container(path) {
  return () => import(`@/containers/${path}`).then(m => m.default || m);
}
const routes = [
  {
    path: "/sign-in",
    name: "SignIn",
    meta: {
      layout: "GuestLayout",
      requiredAuth: false
    },
    component: page("Login")
  },
  {
    path: "/auth/google",
    name: "Login Social",
    meta: {
      layout: "SocialLayout",
      requiredAuth: false
    },
    component: page("LoginSocial")
  },
  {
    path: "/sign-up",
    name: "SignUp",
    meta: {
      layout: "GuestLayout",
      requiredAuth: false
    },
    component: page("Login")
  },
  {
    path: "/",
    redirect: "/dashboard",
    name: "Home",
    meta: {
      layout: "MainLayout",
      requiredAuth: true
    },
    component: container("TheContainer"),
    children: [
      {
        path: "test-pdf",
        name: "Dashboard",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("testPdf")
      },
      {
        path: "dashboard",
        name: "Dashboard",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("Dashboard")
      },
      {
        path: "users",
        name: "Users",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("userList/UsersList")
      },
      {
        path: "rooms/list",
        name: "RoomList",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("room/roomList")
      },
      {
        path: "users/:id",
        name: "UsersUpdate",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        props: true,
        component: view("userList/createUpdateUser")
      },
      {
        path: "user/create",
        name: "UsersCreate",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("userList/createUpdateUser")
      },
      {
        path: "rooms/:id/update",
        name: "RoomUpdate",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        props: true,
        component: view("room/roomEditAdd")
      },
      {
        path: "rooms/create",
        name: "RoomCreate",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("room/roomEditAdd")
      },
      {
        path: "customers/list",
        name: "CustomersList",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("customers/customerList")
      },
      {
        path: "rooms/detail/:id",
        name: "RoomDetailBook",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        props: true,
        component: view("room/detailRoom")
      },
      {
        path: "rooms",
        name: "Room",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("userList/room")
      },
      {
        path: "list-houseware",
        name: "ListHouseware",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("houseware/listHouseware")
      },
      {
        path: "coupon-houseware",
        name: "CouponHouseware",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("houseware/couponHouseware")
      },
      {
        path: "list-coupon-houseware",
        name: "ListCouponHouseware",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("houseware/ListCouponHouseware")
      },
      {
        path: "update-coupon-houseware/:id",
        name: "UpdateCouponHouseware",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        props: true,
        component: view("houseware/updateCouponHouseware")
      },
      {
        path: "list-ingredients",
        name: "ListIngredients",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("ingredients/listIngredients")
      },
      {
        path: "coupon-ingredients",
        name: "CouponIngredients",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("ingredients/couponIngredients")
      },
      {
        path: "list-coupon-ingredients",
        name: "ListCouponIngredients",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("ingredients/listCouponIngredients")
      },
      {
        path: "update-coupon-ingredients/:id",
        name: "UpdateCouponIngredients",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        props: true,
        component: view("ingredients/updateCouponIngredients")
      },
      {
        path: "export-houseware",
        name: "ExportHouseware",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("houseware/exportHouseware")
      },
      {
        path: "list-export-houseware",
        name: "ListExportHouseware",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("houseware/listExportHouseware")
      },
      {
        path: "update-export-houseware/:id",
        name: "UpdateExportHouseware",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        props: true,
        component: view("houseware/updateExportHouseware")
      },
      {
        path: "approve-export-houseware/:id",
        name: "ApproveExportHouseware",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        props: true,
        component: view("houseware/approveExportHouseware")
      },
      {
        path: "get-list-export-houseware",
        name: "GetListExportHouseware",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        props: true,
        component: view("houseware/getListExportHouseware")
      },
      {
        path: "export-ingredients",
        name: "ExportIngredients",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("ingredients/exportIngredients")
      },
      {
        path: "list-export-ingredients",
        name: "ListExportIngredients",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("ingredients/listExportIngredients")
      },
      {
        path: "update-export-ingredients/:id",
        name: "UpdateExportIngredients",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        props: true,
        component: view("ingredients/updateExportIngredients")
      },
      {
        path: "get-list-export-ingredients",
        name: "GetListExportIngredients",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        props: true,
        component: view("ingredients/getListExportIngredients")
      },
      {
        path: "approve-export-ingredients/:id",
        name: "ApproveExportIngredients",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        props: true,
        component: view("ingredients/approveExportIngredients")
      },
      {
        path: "pay/:id",
        name: "Pay",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        props: true,
        component: view("pay")
      },
      {
        path: "room/book/:id",
        name: "BookRoom",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        props: true,
        component: view("userList/BookRoom")
      },
      {
        path: "room/:id/food",
        name: "RoomFood",
        meta: {
          layout: "MainLayout",
          requiredAuth: false
        },
        props: true,
        component: view("Food"),
      },
      {
        path: "room/book/:id/:user_id",
        name: "BookRoomUpdate",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        props: true,
        component: view("userList/BookRoom")
      },
      {
        path: "list-food-order",
        name: "ListFoodOrder",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("room/listFood")
      },
      {
        path: "list-order/:id",
        name: "FoodListOrders",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        props: true,
        component: view("room/listFoodOrder")
      },
      {
        path: "messages",
        name: "Messages",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("messages/Messages")
      },
      {
        path: "messages/:id",
        name: "Message",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("messages/Message")
      },
      {
        path: "list-clean",
        name: "ListClean",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("room/CleanList")
      },
      {
        path: "list-parks",
        name: "ListPark",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("ListPark")
      },
      {
        path: "create-parks",
        name: "CreateParks",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("CreatePark")
      },
      {
        path: "list-food",
        name: "ListFood",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("food/listFood")
      },
      {
        path: "food/create",
        name: "CreateFood",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("food/createUpdateFood")
      },
      {
        path: "admin/chat",
        name: "ChatAdmin",
        meta: {
          layout: "MainLayout",
          requiredAuth: true
        },
        component: view("adminChat")
      },
    ]
  },
  {
    path: "/register-customer",
    name: "RegisterCustomer",
    meta: {
      layout: "MainLayout",
      requiredAuth: false
    },
    component: page("RegisterCustomer")
  },
  {
    path: "/login-customer",
    name: "LoginCustomer",
    meta: {
      layout: "MainLayout",
      requiredAuth: false
    },
    component: page("LoginCustomer")
  },
  {
    path: "/list-room-type",
    name: "ListRoomType",
    meta: {
      layout: "CustomersLayout",
      requiredAuth: true
    },
    component: view("listRoomType")
  },
  {
    path: "/customer",
    name: "Customer",
    meta: {
      layout: "CustomersLayout",
      requiredAuth: false
    },
    component: view("Customer"),
  },
  {
    path: "/room-details",
    name: "RoomDetails",
    meta: {
      layout: "CustomersLayout",
      requiredAuth: false
    },
    component: view("RoomDetails"),
  },
  {
    path: "/location",
    name: "Location",
    meta: {
      layout: "CustomerLayout",
      requiredAuth: false
    },
  },
  {
    path: "/food",
    name: "Food",
    meta: {
      layout: "CustomersLayout",
      requiredAuth: false
    },
    component: view("Food"),
  },
  {
    path: "/chat/:id",
    name: "Chat",
    meta: {
      layout: "MainLayout",
      requiredAuth: true
    },
    component: view("chat")
  },
  {
    path: "/test",
    name: "Test",
    meta: {
      layout: "MainLayout",
      requiredAuth: true
    },
    prop: true,
    component: view("test")
  },
];

export default routes;
