<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:730px">
  <tbody>
    <tr>
        <td colspan="2"></td>
        <td bgcolor="#E8E8E8" colspan="3" height="1px"></td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td bgcolor="#F8F8F8" width="1px"></td>
        <td bgcolor="#E8E8E8" width="1px"></td>
        <td bgcolor="#D1D1D1" width="1px"></td>
        <td bgcolor="#FFF" style="padding: 15px">

        <div style="margin-bottom:15px"><div>
      
        <table lang="header" cellpadding="0" cellspacing="0" width="100%" border="0" style="width:100%">
          <tbody>
            <tr>
              <td width="100%" height="70" valign="top" bgcolor="#FFFFFF" style="padding-top:30px;background:#ffffff;height:70px">
                  <table cellpadding="0" cellspacing="0" width="100%" height="70" border="0" style="width:100%;height:70px">
                      <tbody>
                        <tr>
                          <td style="width:20px" width="20"><div lang="space40"></div></td>
                          <td valign="middle" align="center">
                              <div style="font-size:5px;line-height:5px;height:5px">&nbsp; </div>
                              <div>
                                <a href="https://binhduong.unitopcv.com/">
                                    <img src="https://binhduong.unitopcv.com/public/image/Logo.png" style="display:block;max-height:45px;border:none;object-fit:cover;">
                                </a>
                              </div>
                              
                              <div style="font-size:5px;line-height:5px;height:5px">&nbsp; </div>
                          </td>
                        </tr>
                      </tbody>
                  </table>
              </td>
            </tr>
          </tbody>
        </table>

            
            
            <div style="padding-top:0px">		 
                <div style="color:#0f146d;text-align:center">Cám ơn bạn đã đặt hàng tại Orfarm!</div>
                <div >
                    <h2>Xin chào {{$name}},</h2>
                    <p>Orfarm đã nhận được yêu cầu đặt hàng của bạn và đang xử lý nhé. Bạn sẽ nhận được thông báo tiếp theo khi đơn hàng đã sẵn sàng được giao.</p>

    <p><b>*Lưu ý nhỏ cho bạn:</b> Bạn chỉ nên nhận hàng khi trạng thái đơn hàng là “<b>Đang giao hàng</b>” và nhớ kiểm tra Mã đơn hàng, Thông tin người gửi và Mã vận đơn để nhận đúng kiện hàng nhé.</p>

                </div>
            </div>
            

<div class="m_7958332093758438816section">
<div class="m_7958332093758438816section-header m_7958332093758438816section-header--deliveredTo" style="padding:10px 0;font-weight:700;text-transform:uppercase">Đơn hàng được giao đến</div>
<div class="m_7958332093758438816section-content">
<table cellpadding="2" cellspacing="0" width="100%">
<tbody>
  <tr>
    <td width="25%" valign="top" style="color:#0f146d;font-weight:bold">Tên:</td>
    <td width="75%" valign="top">{{  $name }}</td>
  </tr>
  <tr>
    <td valign="top" style="color:#0f146d;font-weight:bold">Địa chỉ nhà:</td>
    <td valign="top">{{ $address }} </td>
  </tr>
  <tr>
    <td valign="top" style="color:#0f146d;font-weight:bold">Điện thoại:</td>
    <td valign="top">{{ $phone }}</td>
  </tr>
  <tr>
    <td valign="top" style="color:#0f146d;font-weight:bold">Email:</td>
    <td valign="top">{{$email}}</td>
  </tr>
  <tr>
    <td valign="top" style="color:#0f146d;font-weight:bold">Note:</td>
    <td valign="top">{{ $note }}</td>
  </tr>
</tbody>
</table>
</div>
</div>



<div class="m_7958332093758438816section" style="padding-bottom:0px">
<div class="m_7958332093758438816section-content">

        <div class="m_7958332093758438816section-header m_7958332093758438816section-header--yourPackage" style="padding:10px 0;font-weight:700;text-transform:uppercase">Danh Sách Sản Phẩm</div>
        <div class="m_7958332093758438816product" style="border-bottom:0px none">
          <table cellpadding="0" cellspacing="0" style="width:100%">
            <tbody>
              @foreach ($orders as $order)

              <tr>
              <td style="width:40%">
                <div style="padding-right:10px">
                  <a href="{{ "https://binhduong.unitopcv.com/product/".$order->id }}" target="_blank" data-saferedirecturl=""><img src="{{ "https://binhduong.unitopcv.com/".$order->options->product_image }}" style="width:100%;max-width:160px" class="CToWUd" data-bit="iit"></a>
                </div>
              </td>
              <td style="width:60%">
                <div class="m_7958332093758438816product-productInfo-name" style="display:block;padding:10px 0;">
                  <a href="{{ "https://binhduong.unitopcv.com/product/".$order->id }}"><span style="font-size:16px">{{ $order->name }}</span></a>
                </div>
                <div class="m_7958332093758438816product-productInfo-price" style="padding:3px 0;"><span style="font-size:16px">VND {{ number_format($order->price,0,',','.')  }}</span></div>
                <div class="m_7958332093758438816product-productInfo-subInfo" style="padding:3px 0;"><span style="font-size:16px">Số lượng: {{ $order->qty }}</span></div>
              </td>
            </tr>
            @endforeach
          </tbody></table>
        </div>
</div>
</div>

    <div class="m_7958332093758438816section" style="padding-top:0px">
      <div class="m_7958332093758438816section-content">							
        <div class="m_7958332093758438816checkout">
          <div class="m_7958332093758438816two_col">

            <table cellpadding="0" cellspacing="0" class="m_7958332093758438816checkout-amount" style="border-bottom:1px solid #d8d8d8">
              <tbody><tr>
                <td valign="top" style="color:#585858;width:49%">Thành tiền:</td>
                <td align="right" valign="top">VND</td>
                <td align="right" valign="top">{{ $price_total }}</td>
              </tr>
              <tr>
                <td valign="top" style="color:#585858">Phí vận chuyển:</td>
                <td align="right" valign="top">VND</td>
                <td align="right" valign="top">0</td>
              </tr>
              <tr>
                <td valign="top" style="color:#585858">Giảm giá:</td>
                <td align="right" valign="top">VND</td>
                <td align="right" valign="top">(0)</td>
              </tr>
              <tr>
                <td valign="top" style="color:#585858">Tổng cộng:</td>
                <td align="right" valign="top"><div style="color:#f27c24;font-weight:bold">VND</div></td>
                <td align="right" valign="top"><div style="color:#f27c24;font-weight:bold">{{ $price_total }}</div></td>
              </tr>                                        
            </tbody></table>

            <br>

            <table cellpadding="0" cellspacing="0" class="m_7958332093758438816checkout-amount">
              <tbody><tr>
                <td valign="top" style="color:#585858;width:49%">Vận chuyển:</td>
                <td align="right" valign="top" colspan="2">Giao hàng Tiêu chuẩn</td>
              </tr>
              <tr>
                <td valign="top" style="color:#585858;width:49%">Hình thức thanh toán:</td>
                <td align="right" valign="top" colspan="2">Thanh toán khi nhận hàng</td>
              </tr>
            </tbody></table>
          </div>
        </div>
      </div>
    </div>
  


<div class="m_7958332093758438816section">

<div class="m_7958332093758438816section-content">

</div>
</div>

</div>
</div>

 </td>
 
 <td bgcolor="#B3B3B3" width="1px"></td>
 <td bgcolor="#D1D1D1" width="1px"></td>
 <td bgcolor="#E8E8E8" width="1px"></td>
 <td bgcolor="#F8F8F8" width="1px"></td>
</tr>
<tr>
 <td colspan="2"></td>
 <td bgcolor="#B3B3B3" colspan="3" height="1px"></td>
 <td colspan="3"></td>
</tr>
<tr>
 <td colspan="2"></td>
 <td bgcolor="#D1D1D1" colspan="3" height="1px"></td>
 <td colspan="3"></td>
</tr>
<tr>
 <td colspan="2"></td>
 <td bgcolor="#E8E8E8" colspan="3" height="1px"></td>
 <td colspan="3"></td>
</tr>
<tr>
 <td colspan="2"></td>
 <td bgcolor="#F8F8F8" colspan="3" height="1px"></td>
 <td colspan="3"></td>
</tr>

</tbody></table>