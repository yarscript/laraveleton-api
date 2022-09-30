<?php


namespace Yarscript\Organisation\Observers;

use Ramsey\Uuid\Uuid;
use Yarscript\Organisation\Models\Organisation as OrganisationModel;

class Organisation
{
    /**
     * @param OrganisationModel $organisation
     */
    public function creating(OrganisationModel $organisation): void
    {
        $organisation->organisation_uuid = Uuid::uuid4()->toString();
        $organisation->type = $organisation->type ?? 1;
    }
}
