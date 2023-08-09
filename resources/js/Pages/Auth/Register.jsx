import { useEffect } from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';
import ApplicationLogo from '@/Components/ApplicationLogo';
import './Login.css';

export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        npk: '',
        password: '',
        password_confirmation: '',
    });

    useEffect(() => {
        return () => {
            reset('password', 'password_confirmation');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();

        post(route('register'));
    };

    return (
        <GuestLayout>
            <div className="login-container">
                <div className="text-center mb-6">
                    <img src="../assets/img/astra.png" alt="Daihatsu Logo" className="mx-auto mb-2 login-logo" />
                </div>
                <h1 className="login-title">Register</h1>
                <form onSubmit={submit}>
                    <div>
                        <InputLabel htmlFor="username" value="Username" />

                        <TextInput
                            id="username"
                            name="username"
                            value={data.username}
                            className="mt-1 block w-full"
                            autoComplete="username"
                            isFocused={true}
                            onChange={(e) => setData('username', e.target.value)}
                            required
                        />

                        <InputError message={errors.username} className="mt-2" />
                    </div>

                    <div className="mt-4">
                        <InputLabel htmlFor="npk" value="NPK" />

                        <TextInput
                            id="npk"
                            type="text"
                            name="npk"
                            value={data.npk}
                            className="mt-1 block w-full"
                            autoComplete="npk"
                            onChange={(e) => setData('npk', e.target.value)}
                            required
                        />

                        <InputError message={errors.npk} className="mt-2" />
                    </div>

                    <div className="mt-4">
                        <InputLabel htmlFor="password" value="Password" />

                        <TextInput
                            id="password"
                            type="password"
                            name="password"
                            value={data.password}
                            className="mt-1 block w-full"
                            autoComplete="new-password"
                            onChange={(e) => setData('password', e.target.value)}
                            required
                        />

                        <InputError message={errors.password} className="mt-2" />
                    </div>

                    <div className="mt-4">
                        <InputLabel htmlFor="password_confirmation" value="Confirm Password" />

                        <TextInput
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            value={data.password_confirmation}
                            className="mt-1 block w-full"
                            autoComplete="new-password"
                            onChange={(e) => setData('password_confirmation', e.target.value)}
                            required
                        />

                        <InputError message={errors.password_confirmation} className="mt-2" />
                    </div>

                    <div className="flex items-center justify-between mt-6">
                        <PrimaryButton className="login-button" disabled={processing}>
                            Register
                        </PrimaryButton>
                    </div>
                    <div className="login-link-container">
                        Don't have an account?{' '}
                        <Link href={route('login')} className="login-link">
                            Login
                        </Link>
                    </div>
                </form>
            </div>
        </GuestLayout>
    );
}
