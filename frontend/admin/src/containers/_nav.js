export default [
  {
    _name: "CSidebarNav",
    _children: [
      {
        _name: "CSidebarNavItem",
        name: "Trang chủ",
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
        name: "Nhân viên",
        icon: "cil-puzzle",
        items: [
          {
            name: "Danh sách Nhân viên",
            to: "/users"
          },
          {
            name: "Tạo mới Nhân viên",
            to: "user/create"
          }
        ]
      },
      {
        _name: "CSidebarNavDropdown",
        name: "Phòng",
        route: "/rooms",
        icon: "cil-puzzle",
        items: [
          {
            name: "Danh sách phòng",
            to: "/rooms/list"
          },
          {
            name: "Tạo mới phòng",
            to: "/rooms/create"
          }
        ]
      },
      {
        _name: "CSidebarNavDropdown",
        name: "Khách hàng",
        route: "/customers",
        icon: "cil-puzzle",
        items: [
          {
            name: "Danh sách khách hàng",
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
        name: "Kho",
        route: "/houseware",
        icon: "cil-puzzle",
        items: [
          {
            name: "Danh sách đồ dùng",
            to: "/list-houseware"
          },
          {
            name: "Tạo mới phiếu nhập đồ dùng",
            to: "/coupon-houseware"
          },
          {
            name: "Danh sách phiếu nhập đồ dùng",
            to: "/list-coupon-houseware"
          }
        ]
      },
      {
        _name: "CSidebarNavDropdown",
        name: "Thực phẩm",
        route: "/ingredients",
        icon: "cil-puzzle",
        items: [
          {
            name: "Danh sách thực phẩm",
            to: "/list-ingredients"
          },
          {
            name: "Tạo mới phiếu nhập thực phẩm",
            to: "/coupon-ingredients"
          },
          {
            name: "DS phiếu nhập thực phẩm",
            to: "/list-coupon-ingredients"
          }
        ]
      },
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "DS Phiếu xuất đồ dùng",
        to: "/get-list-export-houseware"
      },
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "DS Phiếu xuất thực phẩm",
        to: "/get-list-export-ingredients"
      },
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "DS Phiếu bổ sung công",
        to: "/list-updatetimesheet"
      },
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "DS công trong tháng",
        to: "/timesheet-month"
      }
    ]
  }
];
