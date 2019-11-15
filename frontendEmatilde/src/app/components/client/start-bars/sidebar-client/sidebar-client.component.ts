import { Component, OnInit } from '@angular/core';

declare interface RouteInfo {
  path: string;
  title: string;
  icon: string;
  class: string;
}
export const ROUTES: RouteInfo[] = [
  {
    path: '/dashboard-client',
    title: 'Dashboard',
    icon: 'icon-chart-pie-36',
    class: ''
  },
  {
    path: '/campaigns-client',
    title: 'Campaigns',
    icon: 'icon-atom',
    class: ''
  },
  {
    path: '/profile-client',
    title: 'User Profile',
    icon: 'icon-single-02',
    class: ''
  }
];

@Component({
  selector: 'app-sidebar-client',
  templateUrl: './sidebar-client.component.html',
  styleUrls: ['./sidebar-client.component.css']
})
export class SidebarClientComponent implements OnInit {
  menuItems: any[];

  constructor() {}

  ngOnInit() {
    this.menuItems = ROUTES.filter(menuItem => menuItem);
  }
  isMobileMenu() {
    if (window.innerWidth > 991) {
      return false;
    }
    return true;
  }

}
