import { Link } from "@inertiajs/react";

interface PrimaryButtonLinkProps {
    href: string;
    title: string;
    disabled?: boolean;
    method?: "get" | "post" | "put" | "patch" | "delete";
}

export default function PrimaryButtonLink({
    title,
    disabled,
    href,
    method = "get",
    ...props
}: PrimaryButtonLinkProps) {
    return (
        <Link
            as="button"
            href={href}
            method={method}
            {...props}
            className={`shrink inline-flex items-center px-4 py-2 bg-primary-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:primary-400 focus:primary-600 active:primary-500 focus:outline-none focus:ring-2 focus:primary-500 focus:ring-offset-2 transition ease-in-out duration-150 ${
                disabled && "opacity-25"
            }`}
            disabled={disabled}
        >
            {title}
        </Link>
    );
}
