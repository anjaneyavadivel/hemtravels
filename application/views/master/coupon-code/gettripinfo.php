<table class="table">
    <tbody>
        <tr><td><span class="font600 package_name">Price to Adult:</span></td>
            <td class="table-size text-right"> <?= number_format($pnrinfo->price_to_adult,2); ?></td></tr>
        <tr><td><span class="font600 package_name">Price to Child:</span></td>
            <td class="table-size text-right"> <?= number_format($pnrinfo->price_to_child,2); ?></td></tr>
        <tr><td><span class="font600 package_name">Price to Infan:</span></td>
            <td class="table-size text-right"> <?= number_format($pnrinfo->price_to_infan,2); ?></td></tr>
    </tbody>
</table>