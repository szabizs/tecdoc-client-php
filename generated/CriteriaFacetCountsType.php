<?php

namespace Baumeister\TecDocClient\Generated;

/**
 * Class representing CriteriaFacetCountsType
 *
 * 
 * XSD Type: CriteriaFacetCounts
 */
class CriteriaFacetCountsType
{

    /**
     * The total number of facet counts available
     *
     * @var int $total
     */
    private $total = null;

    /**
     * @var \Baumeister\TecDocClient\Generated\CriteriaFacetCountType[] $counts
     */
    private $counts = [
        
    ];

    /**
     * Gets as total
     *
     * The total number of facet counts available
     *
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Sets a new total
     *
     * The total number of facet counts available
     *
     * @param int $total
     * @return self
     */
    public function setTotal($total)
    {
        $this->total = $total;
        return $this;
    }

    /**
     * Adds as counts
     *
     * @return self
     * @param \Baumeister\TecDocClient\Generated\CriteriaFacetCountType $counts
     */
    public function addToCounts(\Baumeister\TecDocClient\Generated\CriteriaFacetCountType $counts)
    {
        $this->counts[] = $counts;
        return $this;
    }

    /**
     * isset counts
     *
     * @param int|string $index
     * @return bool
     */
    public function issetCounts($index)
    {
        return isset($this->counts[$index]);
    }

    /**
     * unset counts
     *
     * @param int|string $index
     * @return void
     */
    public function unsetCounts($index)
    {
        unset($this->counts[$index]);
    }

    /**
     * Gets as counts
     *
     * @return \Baumeister\TecDocClient\Generated\CriteriaFacetCountType[]
     */
    public function getCounts()
    {
        return $this->counts;
    }

    /**
     * Sets a new counts
     *
     * @param \Baumeister\TecDocClient\Generated\CriteriaFacetCountType[] $counts
     * @return self
     */
    public function setCounts(array $counts)
    {
        $this->counts = $counts;
        return $this;
    }


}

