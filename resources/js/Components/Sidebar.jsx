import React, { useMemo, useEffect, useState, Fragment } from 'react';
import { Link, useRemember } from '@inertiajs/inertia-react';
import { BsChevronDown } from 'react-icons/bs';
import { RiDashboardFill } from 'react-icons/ri';
import { FaAngleDoubleLeft } from 'react-icons/fa'
import NavLink from './NavLink';

export default function Sidebar() {
    
  const userMenuList = [
    { 
      key: 1,
      title: 'Menu 1',
      routeName: '/',
      icon: <RiDashboardFill/>,
    },
    { 
      key: 2,
      title: 'Menu 2',
      routeName: '/',
      icon: <RiDashboardFill/>,
    },
    {
      key: 3,
      title: 'Menu 3',
      routeName: '/',
      icon: <RiDashboardFill/>,
      submenu: true,
      submenuOpen: false,
      submentItems: [
        { 
          key: 31,
          title: 'Submenu 1',
          routeName: 'subscription.plans',
        },
        { 
          key: 32,
          title: 'Submenu 2',
          routeName: 'subscription.plans', 
        },
        { 
          key: 33,
          title: 'Submenu 3',
          routeName: 'subscription.plans',
        }
      ]
    },
    { 
      key: 4,
      title: 'Menu 4',
      routeName: '/',
      icon: <RiDashboardFill/>,
      spacing: true,
    },
    {
      key: 5,
      title: 'Subscriptions',
      routeName: '/',
      icon: <RiDashboardFill/>,
      submenu: true,
      submenuOpen: false,
      submentItems: [
        { 
          key: 51,
          title: 'Subscription Plans',
          routeName: 'subscription.plans',
        },
        { 
          key: 52,
          title: 'Subscription History',
          routeName: 'subscription.user.history', 
        }
      ]
    },
  ];

  const menuList = userMenuList;
  const [menus, setMenus] = useState(menuList);
  const handleSubmenuOpen = key => setMenus(menus.map(menu => menu.key === key ? {...menu, submenuOpen: !menu.submenuOpen} : menu));

  const getSidebarLocalState = () => localStorage.getItem('sidebar') == 'true' ? true : false
  const setSidebarLocalState = (sidebarOpen) => localStorage.setItem('sidebar', !sidebarOpen)
  const [sidebarOpen, setSidebarOpen] = useRemember(getSidebarLocalState(), 'sidebar');
  const handleSidebarOpen = () => {
    setSidebarOpen((previousState) => !previousState);
    setSidebarLocalState(sidebarOpen)

  }

  useEffect(() => {
    let sidebarContainer = document.getElementById('sidebar-container')
    let contentContainer = document.getElementById('content-container')

    sidebarContainer.classList.remove('lg:col-span-1', 'col-span-2', 'pr-5', 'lg:pr-0')
    contentContainer.classList.remove('lg:col-span-11', 'col-span-10', 'pl-5', 'lg:pl-0')

    if(getSidebarLocalState()) {
      sidebarContainer.classList.add('col-span-2', 'pr-5',)
      contentContainer.classList.add('col-span-10', 'pl-5')
    } else {
      sidebarContainer.classList.add('lg:col-span-1', 'col-span-2', 'pr-5', 'lg:pr-0')
      contentContainer.classList.add('lg:col-span-11', 'col-span-10', 'pl-5', 'lg:pl-0')
    }
  }, [sidebarOpen]);

  return (
    <Fragment>
      <div className={`bg-white shadow-lg h-screen overflow-y-auto overflow-x-hidden mx-1 my-5 sm:m-5 sm:rounded relative duration-500 ${sidebarOpen ? 'w-72' : 'w-20'}`}>
        <div className='sidebar-content px-5 py-4 -mt-2 relative'>
          <div className='sidebar-action-icon fixed z-90 bottom-6 left-9'>
            <FaAngleDoubleLeft
              className={`bg-gray-800 text-orange-300 antialiased rounded-full p-1 text-5xl cursor-pointer ${!sidebarOpen && 'rotate-180'}`}
              onClick={handleSidebarOpen}
            />
          </div>
          <div className='menu-list'> 
            <ul>
              {menus.map((menu, key) => (
                <Fragment key={key}>
                  <li 
                    key={key}
                    className={`flex items-center gap-x-4 cursor-pointer p-2 text-gray-600 transition duration-200 hover:text-orange-400 
                    hover:bg-orange-100 rounded ${menu.spacing ? 'mt-9' : 'mt-2'}`}
                    onClick={() => handleSubmenuOpen(menu.key)}
                  >
                    <span className='text-2xl block mr-2'> {menu?.icon} </span>
                    <span className={`truncate font-semibold flex-1 text-sm ${!sidebarOpen && 'hidden'}`}> {menu.title} </span>
                    {menu.submenu && sidebarOpen && (
                      <BsChevronDown className={`${menu?.submenuOpen && 'rotate-180'} p-1 text-lg`}/>
                    )}
                  </li>
                  {menu.submenu && menu?.submenuOpen && sidebarOpen && (
                    <ul>
                      {menu.submentItems.map((submenuItem, key) => (
                        <li key={key} className='flex items-center gap-x-4 cursor-pointer p-2 pl-12 text-gray-600 hover:text-orange-600 rounded'>
                          <NavLink 
                            href={route(submenuItem.routeName)}
                            active={route().current().toString() == submenuItem.routeName}
                          >
                            {submenuItem.title}
                          </NavLink>
                        </li>
                      ))}
                    </ul>
                  )}
                </Fragment>
              ))}
            </ul>
          </div>
        </div>
      </div>
    </Fragment>
  );
}
