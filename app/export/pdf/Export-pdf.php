<?php
ob_clean();


$mpdf = new \Mpdf\Mpdf();
$html = ' 
<table width="100%" border="1" cellpadding="10" cellspacing="0">
<thead>
<tr>
    <th>No.</th>
    <th>Untuk</th>
    <th>Orang</th>
    <th>Nominal</th>
    <th>status</th>
    <th>Jatuh Tempo</th>
</tr>
</thead>';

$num = $start_page + 1;
foreach ($transactions as $transaction):

$html .= '<tbody>
<tr>
    <td>'.$num++.'</td>
    <td>'.$transaction['use_for'].'</td>
    <td>'.$transaction['name'].'</td>
    <td>'.rupiah($transaction['nominal'] - $transaction['temp_nominal']).'</td>
    <td>'.$transaction['status'].'</td>
    <td>'.$transaction['due_date'] .'</td>
</tr>';

endforeach;

$html.= '</tbody>
</table>';



$mpdf->WriteHTML($html );
$mpdf->Output();
// ob_end_flush();

