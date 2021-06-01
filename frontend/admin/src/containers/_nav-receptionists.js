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
        name: "Room",
        to: "/rooms"
      },
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "Export Houseware",
        to: "/export-houseware"
      },
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "List Export Houseware",
        to: "/list-export-houseware"
      }
    ]
  }
];
