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
        name: "ListOrder",
        to: "/list-food-order"
      },
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "ListFood",
        to: "/list-food"
      },
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "Export Ingredients",
        to: "/export-ingredients"
      },
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "List Export Ingredients",
        to: "/list-export-ingredients"
      },
      {
        _name: "CSidebarNavItem",
        icon: "cil-puzzle",
        name: "Room Chat",
        to: "/admin/chat"
      }
    ]
  }
];