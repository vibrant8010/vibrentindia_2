<!DOCTYPE html>
<html lang="en">
<head>
   <?php if (isset($component)) { $__componentOriginal781d22988f835a9692410092c1d21cd6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal781d22988f835a9692410092c1d21cd6 = $attributes; } ?>
<?php $component = App\View\Components\Head::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('head'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Head::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal781d22988f835a9692410092c1d21cd6)): ?>
<?php $attributes = $__attributesOriginal781d22988f835a9692410092c1d21cd6; ?>
<?php unset($__attributesOriginal781d22988f835a9692410092c1d21cd6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal781d22988f835a9692410092c1d21cd6)): ?>
<?php $component = $__componentOriginal781d22988f835a9692410092c1d21cd6; ?>
<?php unset($__componentOriginal781d22988f835a9692410092c1d21cd6); ?>
<?php endif; ?> 
</head>
<body>
   <div class="form-outer admin-login">
      <section class="">

    <table cellspacing="0" cellpadding="0" align="center" style="padding:10px 0;color: rgb(34, 34, 34); font-family: helvetica, &quot;helvetica neue&quot;, arial, verdana, sans-serif; font-size: small;  width: 1119.95px; table-layout: fixed !important;">
        <tbody style="padding: 20px; margin: 0;">
           <tr style="border-collapse: collapse;">
              <td align="center" style="margin: 0px;">
                 <table cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" style="width: 600px;">
                    <tbody>
                       <tr style="border-collapse: collapse;">
                          <td align="left" style="margin: 0px;">
                             <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                   <tr style="border-collapse: collapse;">
                                      <td align="center" valign="top" style="margin: 0px; width: 600px;">
                                         <table cellpadding="0" cellspacing="0" width="100%" role="presentation">
                                            <tbody>
                                               <tr style="border-collapse: collapse;">
                                                  <td align="center" style="margin: 0px; font-size: 0px;">
                                                     <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                        <tbody>
                                                           <tr style="border-collapse: collapse;">
                                                              <td style="margin: 0px; border-bottom: 2px solid rgb(244, 245, 255); background: none; height: 1px; width: 600px;"></td>
                                                           </tr>
                                                        </tbody>
                                                     </table>
                                                  </td>
                                               </tr>
                                            </tbody>
                                         </table>
                                      </td>
                                   </tr>
                                </tbody>
                             </table>
                          </td>
                       </tr>
                       <tr style="border-collapse: collapse;">
                          <td align="left" bgcolor="#ffffff" style="margin: 0px; padding: 25px 40px;">
                             <table cellspacing="0" cellpadding="0" align="left" style="float: left;">
                                <tbody>
                                   <tr style="border-collapse: collapse;">
                                      <td align="left" style="margin: 0px; width: 250px;">
                                         <table width="100%" cellspacing="0" cellpadding="0" role="presentation">
                                            <tbody>
                                               <tr style="border-collapse: collapse;">
                                                  <td align="left" style="margin: 0px; padding-top: 5px; font-size: 0px;"><a rel="noreferrer" style="color: rgb(47, 28, 106); text-decoration-line: underline; font-size: 14px;">
                                                   <img src="<?php echo e(asset('images/company-logo.png')); ?>" alt="" width="159" height="34" class="CToWUd" data-bit="iit" style="display: block; outline: none; text-decoration-line: none;"></a></td>
                                               </tr>
                               </tbody>
                                         </table>
                                      </td>
                                   </tr>
                                </tbody>
                             </table>
                             <table cellpadding="0" cellspacing="0" align="right" style="float: right;">
                                <tbody>
                                   <tr style="border-collapse: collapse;">
                                      <td align="left" style="margin: 0px; width: 250px;">
                                         <table cellpadding="0" cellspacing="0" width="100%" role="presentation">
                                            <tbody>
                                               <tr style="border-collapse: collapse;">
                                                  <td align="center" height="14" style="margin: 0px;"></td>
                                               </tr>
                                               <tr style="border-collapse: collapse;">
                                                  <td align="right" style="margin: 0px;">
                                                     <p style="margin-bottom: 0px; font-family: -apple-system, blinkmacsystemfont, &quot;segoe ui&quot;, roboto, helvetica, arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; line-height: 21px; color: rgb(103, 61, 230); font-size: 14px;"></p>
                                                  </td>
                                               </tr>
                                            </tbody>
                                         </table>
                                      </td>
                                   </tr>
                                </tbody>
                             </table>
                          </td>
                       </tr>
                       <tr style="border-collapse: collapse;">
                          <td align="left" style="margin: 0px; padding-right: 40px; padding-left: 40px;">
                             <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                   <tr style="border-collapse: collapse;">
                                      <td valign="top" align="center" style="margin: 0px; width: 520px;">
                                         <table cellpadding="0" cellspacing="0" width="100%" role="presentation">
                                            <tbody>
                                               <tr style="border-collapse: collapse;">
                                                  <td align="center" height="16" style="margin: 0px;"></td>
                                               </tr>
                                               <tr style="border-collapse: collapse;">
                                                  <td align="left" style="margin: 0px;">
                                                     <h1 style="margin-top: 0px; margin-bottom: 0px; line-height: 34px; font-family: -apple-system, blinkmacsystemfont, &quot;segoe ui&quot;, roboto, helvetica, arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; font-size: 28px; color: rgb(47, 28, 106);"><strong style="color:#209797;">Email Verification Code</strong></h1>
                                                  </td>
                                               </tr>
                                               <tr style="border-collapse: collapse;">
                                                  <td align="center" height="16" style="margin: 0px;"></td>
                                               </tr>
                                               <tr style="border-collapse: collapse;">
                                                  <td align="left" style="margin: 0px;">
                                                     <p style="margin-bottom: 0px; font-family: -apple-system, blinkmacsystemfont, &quot;segoe ui&quot;, roboto, helvetica, arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; line-height: 17px; color: rgb(47, 28, 106); font-size: 14px;">Here is your login verification code:</p>
                                                  </td>
                                               </tr>
                                               <tr style="border-collapse: collapse;">
                                                  <td align="center" height="16" style="margin: 0px;"></td>
                                               </tr>
                                               <tr style="border-collapse: collapse;">
                                                  <td align="left" bgcolor="#f4f5ff" style="margin: 0px; padding: 15px;">
                                                     <p style="margin-bottom: 0px; font-family: -apple-system, blinkmacsystemfont, &quot;segoe ui&quot;, roboto, helvetica, arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; line-height: 33px; color: rgb(103, 61, 230); font-size: 22px;"><strong style="color:#209797;"><?php echo e($otp); ?></strong></p>
                                                  </td>
                                               </tr>
                                               <tr style="border-collapse: collapse;">
                                                  <td align="center" height="16" style="margin: 0px;"></td>
                                               </tr>
                                               <tr style="border-collapse: collapse;">
                                                  <td align="left" style="margin: 0px;">
                                                     <p style="margin-bottom: 0px; font-family: -apple-system, blinkmacsystemfont, &quot;segoe ui&quot;, roboto, helvetica, arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; line-height: 17px; color: rgb(47, 28, 106); font-size: 14px;">Please make sure you never share this code with anyone.</p>
                                                  </td>
                                               </tr>
                                               <tr style="border-collapse: collapse;">
                                                  <td align="center" height="16" style="margin: 0px;"></td>
                                               </tr>
                                               <tr style="border-collapse: collapse;">
                                                  <td align="left" style="margin: 0px;">
                                                     <p style="margin-bottom: 0px; font-family: -apple-system, blinkmacsystemfont, &quot;segoe ui&quot;, roboto, helvetica, arial, sans-serif, &quot;apple color emoji&quot;, &quot;segoe ui emoji&quot;, &quot;segoe ui symbol&quot;; line-height: 17px; color: rgb(47, 28, 106); font-size: 14px;"><b>Note:</b>&nbsp;The code will expire in 15 minutes.</p>
                                                  </td>
                                               </tr>
                                               <tr style="border-collapse: collapse;">
                                                  <td align="center" height="24" style="margin: 0px;"></td>
                                               </tr>
                                            </tbody>
                                         </table>
                                      </td>
                                   </tr>
                                </tbody>
                             </table>
                          </td>
                       </tr>
                       <tr style="border-collapse: collapse;">
                          <td align="left" style="margin: 0px;">
                             <table cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                   <tr style="border-collapse: collapse;">
                                      <td align="center" valign="top" style="margin: 0px; width: 600px;">
                                         <table cellpadding="0" cellspacing="0" width="100%" role="presentation">
                                            <tbody>
                                               <tr style="border-collapse: collapse;">
                                                  <td align="center" style="margin: 0px; font-size: 0px;">
                                                     <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" role="presentation">
                                                        <tbody>
                                                           <tr style="border-collapse: collapse;">
                                                              <td style="margin: 0px; border-bottom: 4px solid rgb(244, 245, 255); background: none; height: 1px; width: 600px;"></td>
                                                           </tr>
                                                        </tbody>
                                                     </table>
                                                  </td>
                                               </tr>
                                            </tbody>
                                         </table>
                                      </td>
                                   </tr>
                                </tbody>
                             </table>
                          </td>
                       </tr>
                    </tbody>
                 </table>
              </td>
           </tr>
        </tbody>
     </table>
     
      </section>
   </div>
   </body>
</html><?php /**PATH C:\xampp\htdocs\vibrant_trade\resources\views/Auth/email-otp.blade.php ENDPATH**/ ?>