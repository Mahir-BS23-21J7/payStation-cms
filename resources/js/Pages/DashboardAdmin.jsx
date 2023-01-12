import React from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/inertia-react';

export default function DashboardAdmin(props) {
    return (
        <AuthenticatedLayout
            guard='admin'
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Admin Dashboard</h2>}
        >
            <Head title="Admin Dashboard" />

            <div className="py-5">
                <div className="mx-auto pl-0 pr-1 sm:pr-4">
                    <div className="bg-white overflow-hidden shadow-sm rounded">
                        <div className="p-6 bg-white border-b border-gray-200">You're logged in as Admin !</div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
