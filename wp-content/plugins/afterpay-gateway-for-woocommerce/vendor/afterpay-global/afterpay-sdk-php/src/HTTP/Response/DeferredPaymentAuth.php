<?php

/**
 * @copyright Copyright (c) 2020-2021 Afterpay Corporate Services Pty Ltd
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Afterpay\SDK\HTTP\Response;

use Afterpay\SDK\Helper\UrlHelper;
use Afterpay\SDK\HTTP\Response;

class DeferredPaymentAuth extends Response
{
    public function __construct()
    {
        parent::__construct();
    }

    public function isApproved()
    {
        return $this->isSuccessful() && $this->getParsedBody()->status == 'APPROVED';
    }

    /**
     * This method is called immediately after the HTTP response is received.
     *
     * Adds a URL for the order view in the merchant portal to the API response.
     *
     * WARNING: This method manipulates the raw HTTP response!
     *
     * @return \Afterpay\SDK\HTTP\Response\DeferredPaymentAuth
     */
    public function afterReceive()
    {
        if ($this->isSuccessful()) {
            $request = $this->getRequest();
            $bodyObj = $this->getParsedBody();

            if (!is_null($bodyObj)) {
                $orderId = $bodyObj->id;
                $countryCode = $request->getMerchantAccountCountryCode();
                $apiEnvironment = $request->getMerchantAccountApiEnvironment();

                $bodyObj->merchantPortalOrderUrl = UrlHelper::generateMerchantPortalOrderUrl($orderId, $countryCode, $apiEnvironment);

                $this->setRawBody(json_encode($bodyObj, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            }
        }

        return $this;
    }
}
