import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link } from '@inertiajs/inertia-react';
import PrimaryButton from '@/Components/PrimaryButton';
import Pagination from '@/Components/Pagination';
import SubHeader from '@/Components/SubHeader';
import BasicCard from '@/Components/BasicCard';

export default function SubscriptionPlans(props) {

    const { subscription_plans } = props
    const { data, links } = subscription_plans

    return (
        <AuthenticatedLayout
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="Subscription Plans" />

            <SubHeader message="Purchasable subscription plans" />

            <BasicCard>
                <div className="overflow-x-auto">
                    <table className="table-fixed md:table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" className="py-3 w-40">#</th>
                                <th scope="col" className="py-3 w-40">Type</th>
                                <th scope="col" className="py-3 w-40">Price</th>
                                <th scope="col" className="py-3 w-40">Currency</th>
                                <th scope="col" className="py-3 w-40">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {data.map(subscriptionPlan => (
                                <tr key={subscriptionPlan.id} className="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td className="py-3 w-40">{subscriptionPlan.id}</td>
                                    <td className="py-3 w-40">{subscriptionPlan.type}</td>
                                    <td className="py-3 w-40">{subscriptionPlan.price / 100}</td>
                                    <td className="py-3 w-40">{subscriptionPlan.currency}</td>
                                    <td className="py-3 w-40">
                                        <Link href={route("subscription.purchase", { subscription_plan_id: subscriptionPlan.id })}>
                                            <PrimaryButton>Purchase</PrimaryButton>
                                        </Link>
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
                <Pagination links={links} />
            </BasicCard>

        </AuthenticatedLayout>
    );
}
