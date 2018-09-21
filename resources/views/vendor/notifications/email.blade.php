@component('mail::message')

<table class="row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:center;vertical-align:top;width:100%">
    <tbody> 
        <th class="small-12 large-12 columns first last" style="Margin:0 auto;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-left:16px;padding-right:16px;padding-top:16px;text-align:left;width:564px">
            <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                <tbody>
                    <tr style="padding:0;text-align:left;vertical-align:top">
                        <th style="Margin:0;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left">
                            <h2 class="text-center" style="Margin:0;Margin-bottom:10px;color:inherit;font-family:Helvetica,Arial,sans-serif;font-size:32px;font-weight:400;line-height:1.3;margin:0;margin-bottom:10px;padding:0;text-align:center;word-wrap:normal">Ciao!!</h2>
                            <p style="margin:0;margin-bottom:10px;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:18px;font-weight:400;line-height:1.3;margin-bottom:10px;padding:0;text-align:center;">Hai ricevuto questa email perché abbiamo ricevuto una richiesta di reimpostazione della password per il tuo account.</p>
                            <table class="spacer" style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                <tbody>
                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                        <td height="16px" style="-moz-hyphens:auto;-webkit-hyphens:auto;Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;hyphens:auto;line-height:16px;margin:0;mso-line-height-rule:exactly;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </th>
                    </tr>
                </tbody>
            </table>
        </th>
    </tbody>
</table>
{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'white';
            break;
        default:
            $color = 'red';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset


{{-- Subcopy --}}
@isset($actionText)
@component('mail::subcopy')
@lang(
    "Se hai problemi con il clic \"Resetta la password\" pulsante, copia e incolla l'URL qui sotto\n".
    'nel tuo browser web: [:actionURL](:actionURL)',
    [
        'actionText' => $actionText,
        'actionURL' => $actionUrl
    ]
)
@endcomponent
@endisset
@endcomponent
