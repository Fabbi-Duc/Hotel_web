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
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "ListClean",
        to: "/list-clean"
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