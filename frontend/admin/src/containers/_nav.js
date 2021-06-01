export default [
  {
    _name: "CSidebarNav",
    _children: [
      {
        _name: "CSidebarNavItem",
        name: "Dashboard",
        to: "/dashboard",
        icon: "cil-speedometer",
        badge: {
          color: "primary",
          text: "NEW"
        }
      },
      // {
      //   _name: "CSidebarNavDropdown",
      //   name: "Hộp thư",
      //   route: "/messages",
      //   icon: "cil-puzzle",
      //   items: [
      //     {
      //       name: "Tin nhắn",
      //       to: "/messages"
      //     },
      //     {
      //       name: "Phòng chat",
      //       to: "/base/breadcrumbs"
      //     }
      //   ]
      // },
      {
        _name: "CSidebarNavDropdown",
        name: "User",
        icon: "cil-puzzle",
        items: [
          {
            name: "Users List",
            to: "/users"
          },
          {
            name: "Users Create",
            to: "user/create"
          }
        ]
      },
      {
        _name: "CSidebarNavDropdown",
        name: "Room",
        route: "/rooms",
        icon: "cil-puzzle",
        items: [
          {
            name: "Rooms List",
            to: "/rooms/list"
          },
          {
            name: "Room Create",
            to: "/rooms/create"
          }
        ]
      },
      {
        _name: "CSidebarNavDropdown",
        name: "Customer",
        route: "/customers",
        icon: "cil-puzzle",
        items: [
          {
            name: "Customers List",
            to: "/customers/list"
          },
          // {
          //   name: "Customer Create",
          //   to: "/customers/create"
          // }
        ]
      },
      {
        _name: "CSidebarNavDropdown",
        name: "Houseware",
        route: "/houseware",
        icon: "cil-puzzle",
        items: [
          {
            name: "Houseware List",
            to: "/list-houseware"
          },
          {
            name: "Coupon Houseware Create",
            to: "/coupon-houseware"
          },
          {
            name: "Coupon Houseware List",
            to: "/list-coupon-houseware"
          }
        ]
      },
      {
        _name: "CSidebarNavDropdown",
        name: "Ingredients",
        route: "/ingredients",
        icon: "cil-puzzle",
        items: [
          {
            name: "Ingredients List",
            to: "/list-ingredients"
          },
          {
            name: "Coupon Ingredients Create",
            to: "/coupon-ingredients"
          },
          {
            name: "Coupon Ingredients List",
            to: "/list-coupon-ingredients"
          }
        ]
      },
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "List Export Houseware",
        to: "/get-list-export-houseware"
      },
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "List Export Ingredients",
        to: "/get-list-export-ingredients"
      }
    ]
  }
];
