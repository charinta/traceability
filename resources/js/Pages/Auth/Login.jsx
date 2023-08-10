import React, { useState, useEffect } from 'react';
import Checkbox from '@/Components/Checkbox';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faEye, faEyeSlash } from '@fortawesome/free-solid-svg-icons';

import './Login.css';

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        username: '',
        password: '',
        remember: false,
    });

    const [showPassword, setShowPassword] = useState("");
    const [visible, setVisible] = useState(false);

    useEffect(() => {
        return () => {
            reset('password');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();
        post(route('login'));
    };

    return (
        <GuestLayout>
            <div className="login-container">
                <div className="text-center mb-6">
                    <img src="../assets/img/astra.png" alt="Daihatsu Logo" className="mx-auto mb-2 login-logo" />
                </div>
                <h1 className="login-title">Login</h1>
                <form onSubmit={submit} className="login-form">
                    <div>
                        <InputLabel htmlFor="username" value="Username" />
                        <TextInput
                            id="username"
                            type="text"
                            name="username"
                            value={data.username}
                            className="mt-1 block w-full"
                            autoComplete="username"
                            isFocused={true}
                            onChange={(e) => setData('username', e.target.value)}
                        />
                        <InputError message={errors.username} className="mt-2" />
                    </div>

                    <div className="mt-4">
                        <InputLabel htmlFor="password" value="Password" />
                        <div className="flex justify-between items-center relative">
                            <TextInput
                                id="password"
                                type={visible ? 'text' : 'password'}
                                name="password"
                                value={data.password}  // Use the actual password value here
                                className="mt-1 block w-full"
                                autoComplete="current-password"
                                onChange={(e) => setData('password', e.target.value)}  // Update the password value
                            />
                            <div className="p-2" onClick={() => setVisible(!visible)}>
                                {visible ? <FontAwesomeIcon icon={faEye} /> : <FontAwesomeIcon icon={faEyeSlash} />}
                            </div>
                        </div>
                        <InputError message={errors.password} className="mt-2" />
                    </div>

                    <div className="block mt-4">
                        <label className="flex items-center">
                            <Checkbox
                                name="remember"
                                checked={data.remember}
                                onChange={(e) => setData('remember', e.target.checked)}
                            />
                            <span className="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                    </div>

                    <div className="flex items-center justify-between mt-6">
                        <PrimaryButton className="login-button" disabled={processing}>
                            Log in
                        </PrimaryButton>
                    </div>
                    <div className="login-link-container">
                        Don't have an account?{' '}
                        <Link href={route('register')} className="login-link">
                            Register
                        </Link>
                    </div>
                </form>
            </div>
        </GuestLayout>
    );
}
