<?php
/**
 * 2007-2016 [PagSeguro Internet Ltda.]
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @author    PagSeguro Internet Ltda.
 * @copyright 2007-2016 PagSeguro Internet Ltda.
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 *
 */

namespace PagSeguro\Resources\Responsibility\Notifications;

/**
 * Class Application
 * @package PagSeguro\Resources\Responsibility\Notifications
 */
class Application implements \PagSeguro\Resources\Responsibility\Notifications\Handler
{
    /**
     * @var
     */
    private $successor;

    /**
     * @param $next
     * @return $this
     */
    public function successor($next)
    {
        $this->successor = $next;
        return $this;
    }

    /**
     * @return mixed
     */
    public function handler()
    {
        if (isset($_POST['notificationCode']) &&
            isset($_POST['notificationType']) &&
            $_POST['notificationType'] == \PagSeguro\Enum\Notification::APPLICATION_AUTHORIZATION) {
            $notification = \PagSeguro\Helpers\NotificationObject::initialize();
            return $notification->getCode();
        }
        throw new \InvalidArgumentException("Invalid notification parameters.");
    }
}