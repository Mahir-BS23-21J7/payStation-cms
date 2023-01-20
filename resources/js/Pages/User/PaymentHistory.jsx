import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link, useForm } from '@inertiajs/inertia-react';
import PrimaryButton from '@/Components/PrimaryButton';
import InputLabel from '@/Components/InputLabel';
import TextInput from '@/Components/TextInput';
import Pagination from '@/Components/Pagination';
import SubHeader from '@/Components/SubHeader';
import BasicCard from '@/Components/BasicCard';

export default function PaymentHistory(props) {

    const { payment_history } = props
    const { data, links } = payment_history
    const { data: formData, setData, get, processing, errors, reset } = useForm({
        sys_trx_no: '',
        gw_payment_id: ''
    });

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
    };

    const submit = (e) => {
        e.preventDefault();
        console.log(formData);
        get(route('user.payments.all', formData));
    };
    return (
        <AuthenticatedLayout
            auth={props.auth}
            errors={props.errors}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >
            <Head title="User Subscription History" />

            <SubHeader message="Subscription history" />

            <BasicCard>
                <form onSubmit={submit}>
                    <div className="mt-4">
                        <InputLabel forInput="sys_trx_no" value="Preferred Transaction No Prefix" />

                        <TextInput
                            type="text"
                            name="sys_trx_no"
                            value={formData.sys_trx_no}
                            className="mt-1 block w-full"
                            autoComplete="sys_trx_no"
                            handleChange={onHandleChange}
                        />
                    </div>

                    <div className="mt-4">
                        <InputLabel forInput="gw_payment_id" value="Preferred webhook url" />

                        <TextInput
                            type="text"
                            name="gw_payment_id"
                            value={formData.gw_payment_id}
                            className="mt-1 block w-full"
                            autoComplete="gw_payment_id"
                            handleChange={onHandleChange}
                        />
                    </div>

                    <PrimaryButton className="ml-4" processing={processing}>
                        Register
                    </PrimaryButton>

                </form>
            </BasicCard>

            <BasicCard>
                <div className="overflow-x-auto">
                    <table className="table-fixed md:table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th className="py-3 w-40">Sys Trx No</th>
                                <th className="py-3 w-40">Gw Payment Id</th>
                                <th className="py-3 w-40">Gw Trx No</th>
                                <th className="py-3 w-40">Gw Trx Ref No</th>
                                <th className="py-3 w-40">Req Amount</th>
                                <th className="py-3 w-40">Apd Amount</th>
                                <th className="py-3 w-10">Currency</th>
                            </tr>
                        </thead>
                        <tbody>
                            {data.map(payment => (
                                <tr key={payment.id} className="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td className="py-3">{payment.sys_trx_no}</td>
                                    <td className="py-3">{payment.gw_payment_id}</td>
                                    <td className="py-3">{payment.gw_trx_no}</td>
                                    <td className="py-3">{payment.gw_trx_ref_no}</td>
                                    <td className="py-3">{payment.sys_requested_amount / 100}</td>
                                    <td className="py-3">{payment.gw_approved_amount / 100}</td>
                                    <td className="py-3">{payment.payment_currency}</td>
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
