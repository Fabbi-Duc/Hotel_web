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
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "Danh sách order",
        to: "/list-food-order"
      },
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "Danh sách món ăn",
        to: "/list-food"
      },
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "Tạo đơn xuất kho",
        to: "/export-ingredients"
      },
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "DS đơn xuất kho",
        to: "/list-export-ingredients"
      },
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "DS bổ sung công",
        to: "/list-info-updatetimesheet"
      }
    ]
  }
];