import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/inertia-react';
import PrimaryButton from '@/Components/PrimaryButton';
import Pagination from '@/Components/Pagination';

export default function SubscriptionHistory(props) {

    const { subscription_history } = props
    const { data, links } = subscription_history

    return (
        <AuthenticatedLayout
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="User Subscription History" />

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
                                        <th scope="col" className="text-justify py-3">Trx Id</th>
                                        <th scope="col" className="text-justify py-3">Type</th>
                                        <th scope="col" className="text-justify py-3">Price</th>
                                        <th scope="col" className="text-justify py-3">Currency</th>
                                        <th scope="col" className="text-justify py-3">Starts At</th>
                                        <th scope="col" className="text-justify py-3">Ends At</th>
                                        <th scope="col" className="text-justify py-3">Paid</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {data.map(userSubscriptionPlan => (
                                        <tr key={userSubscriptionPlan.id} className="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td className="text-justify py-3">{userSubscriptionPlan.sys_trx_no}</td>
                                            <td className="text-justify py-3">{userSubscriptionPlan.subscription_plan.type}</td>
                                            <td className="text-justify py-3">{userSubscriptionPlan.subscription_plan.price / 100}</td>
                                            <td className="text-justify py-3">{userSubscriptionPlan.subscription_plan.currency}</td>
                                            <td className="text-justify py-3">{userSubscriptionPlan.starts_at}</td>
                                            <td className="text-justify py-3">{userSubscriptionPlan.ends_at}</td>
                                            <td className="text-justify py-3">{userSubscriptionPlan.status ? 'YES' : 'NO'}</td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                            <Pagination links={links} />
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
