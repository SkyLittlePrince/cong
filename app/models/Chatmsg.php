<?php
class Chatmsg extends \Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'chatmsgs';

  public $timestamps = true;
  public $primaryKey = 'id';
  public $incrementing = true;

  protected $fillable = array(
      'sender',
      'receiver',
      'content',
      'status'
    );

  public function receiver()
  {
    return $this->belongsTo('User', 'receiver', 'id');
  }
}
