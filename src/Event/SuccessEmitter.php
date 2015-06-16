<?hh // strict

namespace HackPack\HackUnit\Event;

trait SuccessEmitter
{
    private Vector<SuccessListener> $successListeners = Vector{};

    public function onSuccess(SuccessListener $l) : this
    {
        $this->successListeners->add($l);
        return $this;
    }

    public function setSuccessListeners(Traversable<SuccessListener> $listeners) : this
    {
        $this->successListeners->clear()->setAll(new Vector($listeners));
        return $this;
    }

    private function emitSuccess() : void
    {
        foreach($this->successListeners as $l) {
            $l();
        }
    }
}