<div>
   <div class="table-responsive table-striped">
      <table class="table">
         <tr>
            <th>Variable</th>
            <th>Preview</th>
         </tr>
         @php
            $body = @$template->body;
            $body_var = preg_match_all('/\{(.*?)\}/', $body, $matches);
            $variables = array_unique($matches[1]);

         @endphp

         @foreach ($variables as $variable)
            <tr>
               <td>{{ '{' .$variable . '}'}}</td>
                @if($variable == 'customer_name')
                    <td>
                        Customer Name/Username
                    </td>
                @endif
                @if($variable == 'reset_link')
                    <td>
                     Password Reset Link
                    </td>
                @endif
                @if($variable == 'verification_link')
                    <td>
                      Email Verification Link
                    </td>
                @endif
                @if($variable == 'activation_link')
                    <td>
                      Account Verification Link
                    </td>
                @endif
                @if($variable == 'membership_details')
                    <td>
                      Membership Details
                    </td>
                @endif
                @if($variable == 'transaction_id')
                    <td>
                      Transaction ID
                    </td>
                @endif
                @if($variable == 'renewal_date')
                    <td>
                      Renewal Date
                    </td>
                @endif
                @if($variable == 'order_details')
                    <td>
                      Order Details
                    </td>
                @endif
                @if($variable == 'tracking_number')
                    <td>
                      Tracking Number
                    </td>
                @endif
                @if($variable == 'order_details')
                    <td>
                      Order Details
                    </td>
                @endif
                @if($variable == 'order_details')
                    <td>
                      Order Details
                    </td>
                @endif

            </tr>
         @endforeach

      </table>
   </div>
</div>
