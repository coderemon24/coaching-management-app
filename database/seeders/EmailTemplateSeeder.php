<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (class_exists('App\Models\Settings\EmailTemplate')) {
            $templates = [
                [
                    'type' => 'welcome',
                    'subject' => 'Welcome to Our Platform',
                    'body' => 'Hello {name}, welcome to our platform!',
                ],
                [
                    'type' => 'password_reset',
                    'subject' => 'Password Reset Request',
                    'body' => 'Click here to reset your password: {reset_link}',
                ],
                [
                    'type' => 'verify_email',
                    'subject' => 'Verify Your Email Address',
                    'body' => 'Please verify your email address by clicking the link: {verification_link}',
                ],
                [
                    'type' => 'account_activation',
                    'subject' => 'Activate Your Account',
                    'body' => 'Please activate your account by clicking the link: {activation_link}',
                ],
                [
                    'type' => 'membership_buying',
                    'subject' => 'Membership Purchase Confirmation',
                    'body' => 'Thank you for purchasing a membership! Your membership details are as follows: {membership_details}',
                ],
                [
                    'type' => 'payment_success',
                    'subject' => 'Payment Successful',
                    'body' => 'Your payment was successful! Transaction ID: {transaction_id}',
                ],
                [
                    'type' => 'payment_failed',
                    'subject' => 'Payment Failed',
                    'body' => 'Your payment failed. Please try again or contact support.',
                ],
                [
                    'type' => 'payment_cancelled',
                    'subject' => 'Payment Cancelled',
                    'body' => 'Your payment has been cancelled. If this was a mistake, please try again.',
                ],
                [
                    'type' => 'payment_refunded',
                    'subject' => 'Payment Refunded',
                    'body' => 'Your payment has been refunded. Transaction ID: {transaction_id}',
                ],
                [
                    'type' => 'subscription_renewal',
                    'subject' => 'Subscription Renewal Reminder',
                    'body' => 'Your subscription is due for renewal on {renewal_date}. Please ensure your payment details are up to date.',
                ],
                [
                    'type' => 'subscription_expired',
                    'subject' => 'Subscription Expired',
                    'body' => 'Your subscription has expired. Please renew to continue enjoying our services.',
                ],
                [
                    'type' => 'subscription_cancelled',
                    'subject' => 'Subscription Cancelled',
                    'body' => 'Your subscription has been cancelled. If this was a mistake, please contact support.',
                ],
                [
                    'type' => 'subscription_renewal_success',
                    'subject' => 'Subscription Renewal Successful',
                    'body' => 'Your subscription has been successfully renewed. Transaction ID: {transaction_id}',
                ],
                [
                    'type' => 'subscription_renewal_failed',
                    'subject' => 'Subscription Renewal Failed',
                    'body' => 'Your subscription renewal failed. Please check your payment details or contact support.',
                ],
                [
                    'type' => 'order_processing',
                    'subject' => 'Order Processing',
                    'body' => 'Your order is being processed. We will notify you once it is shipped.',
                ],
                [
                    'type' => 'order_confirmation',
                    'subject' => 'Order Confirmation',
                    'body' => 'Thank you for your order! Your order details are as follows: {order_details}',
                ],
                [
                    'type' => 'order_shipped',
                    'subject' => 'Order Shipped',
                    'body' => 'Your order has been shipped! Tracking number: {tracking_number}',
                ],
                [
                    'type' => 'order_delivered',
                    'subject' => 'Order Delivered',
                    'body' => 'Your order has been delivered! We hope you enjoy your purchase.',
                ],
                [
                    'type' => 'order_placed',
                    'subject' => 'Order Placed',
                    'body' => 'Thank you for your order! Your order details are as follows: {order_details}',
                ],
                [
                    'type' => 'order_cancelled',
                    'subject' => 'Order Cancelled',
                    'body' => 'Your order has been cancelled. If this was a mistake, please contact support.',
                ],
                [
                    'type' => 'order_rejected',
                    'subject' => 'Order Rejected',
                    'body' => 'Your order has been rejected. Please contact support for more information.',
                ],
                [
                    'type' => 'payment_pending',
                    'subject' => 'Payment Pending',
                    'body' => 'Your payment is currently pending. Please complete the payment to finalize your order.',
                ],
                [
                    'type' => 'payment_rejected',
                    'subject' => 'Payment Rejected',
                    'body' => 'Your payment has been rejected. Please check your payment details or contact support.',
                ],
            ];

            foreach ($templates as $template) {
                \App\Models\Settings\EmailTemplate::updateOrCreate(
                    $template
                );
            }
        } else {
            throw new \Exception('EmailTemplate model does not exist.');
        }
    }
}
