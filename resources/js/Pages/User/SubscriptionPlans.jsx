import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/inertia-react';
import PrimaryButton from '@/Components/PrimaryButton';

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
                            <table className="table-fixed w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" className="text-center py-6">#</th>
                                        <th scope="col" className="text-center py-6">Type</th>
                                        <th scope="col" className="text-center py-6">Price</th>
                                        <th scope="col" className="text-center py-6">Currency</th>
                                        <th scope="col" className="text-center py-6">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {props.subscription_plans.map(subscriptionPlan => (
                                        <tr key={subscriptionPlan.id} className="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td className="text-center py-6">{subscriptionPlan.id}</td>
                                            <td className="text-center py-6">{subscriptionPlan.type}</td>
                                            <td className="text-center py-6">{subscriptionPlan.price / 100}</td>
                                            <td className="text-center py-6">{subscriptionPlan.currency}</td>
                                            <td className="text-center py-6"><Link href={route("subscription.user.history", subscriptionPlan.id)}> <PrimaryButton>Purchase</PrimaryButton></Link></td>
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
