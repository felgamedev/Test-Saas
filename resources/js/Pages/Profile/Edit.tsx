import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import DeleteUserForm from "./Partials/DeleteUserForm";
import UpdatePasswordForm from "./Partials/UpdatePasswordForm";
import UpdateProfileInformationForm from "./Partials/UpdateProfileInformationForm";
import { Head } from "@inertiajs/react";
import { PageProps } from "@/types";
import Card from "@/Components/Card";
import PageContainer from "@/Components/PageContainer";
import PageHeading from "@/Components/PageHeading";

export default function Edit({
    auth,
    mustVerifyEmail,
    status,
}: PageProps<{ mustVerifyEmail: boolean; status?: string }>) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<PageHeading label="Profile" />}
        >
            <Head title="Profile" />

            <PageContainer>
                <Card
                    className="max-w-xl"
                    heading="Profile Information"
                    subheading="Update your account's profile information and email address."
                >
                    <UpdateProfileInformationForm
                        mustVerifyEmail={mustVerifyEmail}
                        status={status}
                    />
                </Card>

                <Card
                    className="max-w-xl"
                    heading="Update Password"
                    subheading="Ensure your account is using a long, random password to stay secure."
                >
                    <UpdatePasswordForm />
                </Card>

                <Card
                    className="max-w-xl"
                    heading="Delete Account"
                    subheading="Once your account is deleted, all of its resources and data
                    will be permanently deleted. Before deleting your account,
                    please download any data or information that you wish to
                    retain."
                >
                    <DeleteUserForm />
                </Card>
            </PageContainer>
        </AuthenticatedLayout>
    );
}
