class CompareArray{
    private function clearFilterSettingsBeforeCheck(array &$aToClear)
    {
        $aToClear = array_filter($aToClear, fn ($value) => !is_null($value) && $value !== '');
    }

    private function compareFilterSettings(array $aNew, array $aToCompare)
    {
        self::clearFilterSettingsBeforeCheck($aNew);
        self::clearFilterSettingsBeforeCheck($aToCompare);
        $aDiff1 = array_diff_assoc($aNew, $aToCompare);
        $aDiff2 = array_diff_assoc($aToCompare, $aNew);
        if (count($aDiff1) == 0 && count($aDiff2) == 0) { // maybe there is a better way, but I don't have trust to the == when an array is complex
            return true;
        } else {
            return false;
        }
    }
}
