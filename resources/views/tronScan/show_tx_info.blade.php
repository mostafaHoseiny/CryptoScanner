<div>
    <h1>Transaction details</h1>

    @if($tx_info->error)
        <div>{{ $tx_info->message }}</div>
    @endif
    <p>
        <div>
        Account {{ $tx_info->data->contractData->owner_address }} delegated {{ $tx_info->data->contractData->resourceValue }} {{ $tx_info->data->contractData->resource }} to {{ $tx_info->data->contractData->receiver_address }}
        TApBLQiWR8DyoLeN99htHXDynak
        eYv44fk
        </div>
    </p>
    <p>
        <div>Result: {{ $tx_info->data->contractRet }}</div>
        <div>contract Type: {{ $tx_info->data->contractType }}</div>
        <div>to Address: {{ $tx_info->data->toAddress }}</div>
        <div>@if($tx_info->data->confirmed) CONFIRMED @else UNCONFIRMED @endif</div>
        <div>{{ $tx_info->data->block }}</div>
        <div>{{ $tx_info->data->timestamp }}</div>
        <div>net fee cost: {{ $tx_info->data->cost->net_fee_cost }}</div>
        <div>Resources Consumed & Fee: {{ $tx_info->data->cost->net_usage }}</div>
        <div>Confirmed by <span>{{ $tx_info->data->confirmations }}</span> blocks</div>
        <div>Signature List: {{ $tx_info->data->signature_addresses[0] }}</div>
        <div>Owner Address: {{ $tx_info->data->ownerAddress }}</div>
        <div>
            <ul>
            @foreach($tx_info->data->srConfirmList as $item)
                 <li><a href="{{ $item->url }}">{{ $item->name }}</a></li>
            @endforeach
            </ul>
        </div>
        <div>{{ $tx_info->data->hash }}</div>
        <div>Staked Asset Withheld: {{ $tx_info->data->contractData->balance }}</div>
        <div>Delegated Resources: {{ $tx_info->data->contractData->resource }}</div>
    </p>
</div>

{{--"contractRet" => "SUCCESS"         -> Result--}}
{{--"contractType" => 57--}}
{{--"toAddress" => "TApBLQiWR8DyoLeN99htHXDynakeYv44fk"--}}
{{--"confirmed" => true--}}
{{--"block" => 64277431       -> block--}}
{{--"timestamp" => 1723478283000        -> Time--}}
{{--"cost" => array:13 [▼--}}
{{--"net_usage" => 281              -> Resources Consumed & Fee--}}
{{--"net_fee_cost" => 1000          -> net fee cost--}}
{{--"date_created" => 1723478283--}}
{{--"confirmations" => 738          -> Confirmed by over 200 blocks--}}
{{--"signature_addresses" => "TGiHbJ79MYaH8UdEWww7EXff2WHMTgSoHu"          -> Signature List--}}
{{--"ownerAddress" => "TY2DJJzUB6yS9v1CZ7XQNL5MMySCrVQmjD"--}}
{{--"srConfirmList" => array:19 [▶]        -> Confirmed SRs--}}
{{--"hash" => "1f3cc91fe6b6de99b40cf0b571b3db31ef207627cb64e4d4a683c7c73ae043a5"--}}
{{--"contractData" => array:5 [▼--}}
{{--"balance" => 2797000000     -> Staked Asset Withheld--}}
{{--"resource" => "ENERGY"      -> Delegated Resources--}}
{{--"receiver_address" => "TApBLQiWR8DyoLeN99htHXDynakeYv44fk"      -> Receiving Address--}}
{{--"owner_address" => "TY2DJJzUB6yS9v1CZ7XQNL5MMySCrVQmjD"         -> Owner Address--}}
{{--"resourceValue" => 32003.11       -> 32,003.11 Energy--}}