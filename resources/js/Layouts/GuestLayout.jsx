import { Link } from '@inertiajs/react';
import './Guest.css'; // Import your custom CSS file

export default function Guest({ children, title }) {
    return (
        <div className="min-h-screen flex items-center justify-center">
            <div className="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <h1 className="text-2xl font-semibold mb-4">{title}</h1>
                {children}
            </div>
        </div>
    );
}
