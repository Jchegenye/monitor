<?php

namespace Monitor\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request, array('id' => $this->_id));
        return [

          //Website Data
          'id' => $this->id,
          'uri' => $this->uri,
          'site_name' => $this->site_info['site_name'],
          'site_url' => $this->site_info['site_url'],
          'check_type' => $this->site_info['check_type'],
          'success'=> $this->success,
          'status'=> $this->status,
          'message'=> $this->message,
          'transfer_time' => $this->transfer_time,
          'status'=> $this->status,

          //Notifications Data
          'downtime' => $this->data,

        ];
    }
}
