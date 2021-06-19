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
        name: "DS phòng",
        to: "/rooms"
      },
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "Tạo đơn xuất kho",
        to: "/export-houseware"
      },
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "DS đơn xuất kho",
        to: "/list-export-houseware"
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
