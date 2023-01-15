import { Fragment } from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/inertia-react';

export default function Dashboard(props) {
    return (
        <AuthenticatedLayout
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Dashboard" />

            <div className="py-5">
                <div className="mx-auto pl-0 pr-1 sm:pr-4">
                    <div className="bg-white-200 overflow-hidden shadow-sm rounded">
                        <div className="p-6 bg-white border-b border-gray-200">Purchasable subscription plans</div>
                    </div>
                </div>
            </div>

            <div className="py-0">
                <div className="mx-auto pl-0 pr-1 sm:pr-4">
                    <div className="bg-white-200 overflow-hidden shadow-sm rounded">
                        <div className="p-6 bg-white border-b border-gray-200">
                            <table className="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" className="px-auto py-6 pl-3">Type</th>
                                        <th scope="col" className="px-auto py-6">Price</th>
                                        <th scope="col" className="px-auto py-6">Currency</th>
                                        <th scope="col" className="px-auto py-6 pr-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                {props.subscription_plans.map(subscriptionPlan => (
                                    <tr key={subscriptionPlan.id} className="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td className="px-auto py-6 pl-3">{subscriptionPlan.type}</td>
                                        <td className="px-auto py-6">{subscriptionPlan.price / 100}</td>
                                        <td className="px-auto py-6">{subscriptionPlan.currency}</td>
                                        <td className="px-auto py-6 pr-3">Button</td>
                                    </tr>
                                ))}                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
