import React, { useState, useEffect } from 'react';
import ApplicationLogo from '@/Components/ApplicationLogo';
import NavLink from '@/Components/NavLink';
import Sidebar from '@/Components/Sidebar';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink';
import { Link } from '@inertiajs/inertia-react';
import SidebarAdmin from '@/Components/SidebarAdmin';

export default function Authenticated({ guard, auth, header, children }) {
    const [showingNavigationDropdown, setShowingNavigationDropdown] = useState(false);

    return (
        <div className="min-h-screen bg-gray-100 overflow-hidden">
            <nav className="bg-white border-b border-gray-100">
                <div className="mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex justify-between h-16">
                        <div className="flex">

                            <div className="shrink-0 flex items-center pl-3">
                                <Link href="/">
                                    <ApplicationLogo className="block h-9 w-auto text-gray-500" />
                                </Link>
                            </div>

                            <div className="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <NavLink
                                    href={route(guard ? `${guard}.dashboard` : 'dashboard')}
                                    active={route().current(guard ? `${guard}.dashboard` : 'dashboard').toString()}>
                                    Dashboard
                                </NavLink>
                            </div>
                        </div>

                        <div className="hidden sm:flex sm:items-center sm:ml-6">
                            <div className="ml-3 relative">
                                <span className="inline-flex rounded-md">
                                    <button
                                        guard="button"
                                        className="inline-flex items-center px-3 py-2 border border-transparent text-sm 
                                        leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 
                                        focus:outline-none transition ease-in-out duration-150"
                                    >
                                        {auth.user.name}
                                    </button>
                                </span>
                                <Link
                                    href={route(guard ? `${guard}.logout` : 'logout')}
                                    method="post"
                                    as="button"
                                    className="inline-flex items-center px-3 py-2 border border-transparent 
                                    text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:font-semibold 
                                    hover:text-orange-700 focus:outline-none transition ease-in-out duration-150">
                                    Log Out
                                </Link>
                            </div>
                        </div>

                        <div className="-mr-2 flex items-center sm:hidden">
                            <button
                                onClick={() => setShowingNavigationDropdown((previousState) => !previousState)}
                                className="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                            >
                                <svg className="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        className={!showingNavigationDropdown ? 'inline-flex' : 'hidden'}
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        className={showingNavigationDropdown ? 'inline-flex' : 'hidden'}
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div className={(showingNavigationDropdown ? 'block' : 'hidden') + ' sm:hidden'}>

                    <div className="pt-4 pb-1 border-t border-gray-200">
                        <div className="px-4">
                            <div className="font-medium text-base text-gray-800">{auth.user.name}</div>
                            <div className="font-medium text-sm text-gray-500">{auth.user.email}</div>
                        </div>

                        <div className="mt-3 space-y-1">
                            <ResponsiveNavLink
                                href={route(guard ? `${guard}.logout` : 'logout')} method="post" as="button" className="hover:text-orange-700">
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            {/* {header && (
                <header className="bg-white shadow">
                    <div className="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">{header}</div>
                </header>
            )} */}

            <main>
                <div className='grid grid-cols-12'>

                    {/* sidebar */}
                    <div className="col-span-2 pr-5">
                        {guard ? <SidebarAdmin guard /> : <Sidebar />}
                    </div>


                    {/* content */}
                    <div className="col-span-10 pl-5">
                        {children}
                    </div>


                </div>
            </main>
        </div>
    );
}
